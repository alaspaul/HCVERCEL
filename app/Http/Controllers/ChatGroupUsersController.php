<?php

namespace App\Http\Controllers;

use App\Models\chatGroup;
use App\Models\chatGroupUsers;
use App\Models\resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChatGroupUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = chatGroupUsers::all();
        
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $this->ValidateChatGroupMessages($request);
        if($valid == false){
            return response('Invalid data');
        }

        $user = Auth::user();


        $chatGroupId = $this->ifNew($request['chatGroup_id']);
        
        $chatGroupUsers = $this->allUsersinGroup($chatGroupId)->toArray();

       
        if(!in_array($request['resident_id'],  $chatGroupUsers) ){
            $newId = $this->createNewId($request, $chatGroupId);
            chatGroupUsers::insert([
                'chatGroupUsers_id' => $newId,
                'chatGroup_id' => $chatGroupId,
                'resident_id' => $request['resident_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
            
        if(!in_array($user['resident_id'],  $chatGroupUsers) ){
            $newId = $this->createNewId($request, $chatGroupId);
            chatGroupUsers::insert([
                'chatGroupUsers_id' => $newId,
                'chatGroup_id' => $chatGroupId,
                'resident_id' => $user['resident_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
            return $chatGroupId;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $valid = $this->ValidateChatGroupMessages($request);
        if($valid == false){
            return response('invalid input');
        }

        $resident = resident::where('resident_id', $request['residsent_id'])->first();
        if($resident == null){
            return response('resident does not exist');
        }

        $chatGroup = chatGroup::where('chatGroup_id', $request['chatGroup_id'])->first();
        if($chatGroup == null){
            return response('chatGroup does not exist');
        }

        $chatGroupUsers = chatGroupUsers::where('chatGroupUsers_id', $id)->first();
        if($chatGroupUsers == null){
            return response('chatGroupUsers does not exist');
        }

        chatGroupUsers::where('chatGroupUsers_id', $id)->update([
            'chatGroup_id' => $request['chatGroup_id'],
            'resident_id' => $user['resident_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response('done');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $chatGroupUsers = chatGroupUsers::where('chatGroupUsers_id', $id)->first();
        if($chatGroupUsers == null){
            return response('chatGroupUsers does not exist');
        }

        chatGroupUsers::destroy($id);
        return response('deleted');
    }
    /**
     * Retrieve all chat groups where the user is a member.
     *
     * @return array The formatted group data containing chat group ID and details of the other resident in the group.
     */

    public function allGroups(){
        $user = Auth::user();
        
        // Fetch chat groups where the user is a member
        $myGroups = chatGroupUsers::where('resident_id', $user['resident_id'])->get();
    
        // Define an array to store formatted group data
        $formattedGroups = [];
    
        foreach ($myGroups as $group) {
            // Get the other resident in the chat group (excluding the current user)
            $otherResident = chatGroupUsers::where('chatGroup_id', $group->chatGroup_id)
                ->where('resident_id', '!=', $user['resident_id'])
                ->first();
    
            // Check if the other resident exists
            if ($otherResident) {
                // Fetch the resident details using the Resident model
                $otherResidentDetails = resident::find($otherResident->resident_id);
    
                // Add the formatted group data to the array
                $formattedGroups[] = [
                    'chatGroup_id' => $group->chatGroup_id,
                    'other_resident_fName' => $otherResidentDetails->resident_fName,
                    'other_resident_lName' => $otherResidentDetails->resident_lName,
                    'resident_id' => $otherResidentDetails->resident_id
                ];
            }
        }
    
        return $formattedGroups;
    }
    
    
    /**
     * Retrieve all users in a chat group.
     *
     * @param int $chatGroup_id The ID of the chat group.
     * @return \Illuminate\Support\Collection The collection of resident IDs in the chat group, or a string indicating that the chat group does not exist.
     */
    public function allUsersinGroup($chatGroup_id){
        // Retrieve the chat group by ID
        $chatGroup = chatGroup::where('chatGroup_id', $chatGroup_id)->first();

        // Check if the chat group exists
        if($chatGroup == null){
            return response('chatGroup does not exist');
        }

        // Retrieve the resident IDs of the users in the chat group
        $groupUsers = chatGroupUsers::where('chatGroup_id', $chatGroup_id)->pluck('resident_id');

        return $groupUsers;
    }


    /**
     * Check if a variable is new.
     *
     * @param mixed $variable The variable to check.
     * @return mixed The variable itself if it exists in the chat group array, null otherwise. If the variable is null, a new chat group ID is generated and returned.
     */
    public function ifNew($variable){
        
        // Check if the variable is not null
        if($variable != null){
            // Retrieve all chat group IDs
            $chatGroupIds = chatGroup::select('chatGroup_id')->get();
            $chatGroupArray = $chatGroupIds->toArray();
        

            // Check if the variable exists in the chat group array
            if(in_array($variable,  $chatGroupArray)){
                return $variable;
            }else{
                return null;
            }
        }else{
            // Create a new ChatGroupController instance
            $chatGroup = new ChatGroupController;

            // Generate a new chat group ID
            $newid = $chatGroup->store();

            return $newid;
        }
    }

    /**
     * Adds residents to a chat group.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addResidents(Request $request)
    {
        // Retrieve the chat group based on the provided chatGroup_id
        $chatGroup = ChatGroup::where('chatGroup_id', $request['chatGroup_id'])->first();

        // Check if the chat group exists
        if ($chatGroup == null) {
            return response('chatGroup does not exist');
        }

        // Get all users in the chat group
        $residents = $this->allUsersinGroup($request['chatGroup_id'])->toArray();

        // Get the unassigned residents (residents not in the chat group)
        $unassignedResidents = Resident::whereNotIn('resident_id', $residents)->get();

        // Return the unassigned residents as a JSON response
        return response()->json($unassignedResidents);
    }
    /**
     * Retrieves the unassigned residents for the first time adding residents to a chat group.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function firstAddResidents(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();
    
        // Retrieve the chat group IDs where the current user is present
        $userChatGroupIds = ChatGroupUsers::select('chatGroup_id')
            ->where('resident_id', $user->resident_id)
            ->pluck('chatGroup_id');
    
        // Get the resident IDs of the users in the current user's chat groups
        $residentIdsInUserChatGroups = ChatGroupUsers::whereIn('chatGroup_id', $userChatGroupIds)
            ->pluck('resident_id');
    
        // Get the residents who are not part of the current user's chat groups
        $unassignedResidents = Resident::whereNotIn('resident_id', $residentIdsInUserChatGroups)
            ->where('resident_id', '<>', $user->resident_id) // Exclude the current user
            ->get();
    
        // Return the unassigned residents as a JSON response
        return response()->json($unassignedResidents);
    }
    /**
     * Validates the chat group messages request.
     *
     * @param Request $request The request object.
     * @return bool Returns true if the request parameters are valid, false otherwise.
     */
    private function ValidateChatGroupMessages(Request $request){
        // Validation rules for the request parameters
        $validator = Validator::make($request->all(), [
            'resident_id' => 'required',
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }

    /**
     * Creates a new ID for chat group users.
     *
     * @param Request $request The request object.
     * @param int $chatGroupId The ID of the chat group.
     * @return string The newly created ID for chat group users.
     */
    private function createNewId(Request $request, $chatGroupId){

        $latestorder = chatGroupUsers::all()->count();
        $currentId = $chatGroupId . 'CGU' . $latestorder;
        if( !empty(chatGroupUsers::select('chatGroupUsers_id')->where('chatGroupUsers_id', $currentId)->first()->chatGroupUsers_id)){
            do{
                $latestorder++;
                $depId = $chatGroupId . 'CGU' . $latestorder;
                $id = chatGroupUsers::select('chatGroupUsers_id')->where('chatGroupUsers_id', $depId)->first()->chatGroupUsers_id;
             
            }while(!empty($id));
        }
        $newId = $chatGroupId . 'CGU' . $latestorder;

        return $newId;
    }
}
