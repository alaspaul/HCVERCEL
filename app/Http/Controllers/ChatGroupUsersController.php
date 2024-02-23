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
        $validator = Validator::make($request->all(), [
            'chatGroup_id' => 'required',
            'resident_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = Auth::user();
        $latestorder = chatGroupUsers::all()->count();

        $chatGroupId = $this->ifNew($request['chatGroup_id']);

        if ($chatGroupId == null) {
            return 'chatGroup id does not exist';
        }
        
        $currentId = $chatGroupId . 'CGU' . $latestorder;

        $chatGroupUsers = $this->allUsersinGroup($request['chatGroup_id'])->toArray();

        if(!in_array($request['resident_id'],  $chatGroupUsers) ){
        if( !empty(chatGroupUsers::select('chatGroupUsers_id')->where('chatGroupUsers_id', $currentId)->first()->chatGroupUsers_id)){
            do{
                $latestorder++;
                $depId = $chatGroupId . 'CGU' . $latestorder;
                $id = chatGroupUsers::select('chatGroupUsers_id')->where('chatGroupUsers_id', $depId)->first()->chatGroupUsers_id;
             
            }while(!empty($id));
        }
    
            $newId = $chatGroupId . 'CGU' . $latestorder;
            
            chatGroupUsers::insert([
                'chatGroupUsers_id' => $newId,
                'chatGroup_id' => $chatGroupId,
                'resident_id' => $request['resident_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        }



            
            if(!in_array($user['resident_id'],  $chatGroupUsers) ){
        
                if( !empty(chatGroupUsers::select('chatGroupUsers_id')->where('chatGroupUsers_id', $currentId)->first()->chatGroupUsers_id)){
                    do{
                        $latestorder++;
                        $depId = $chatGroupId . 'CGU' . $latestorder;
                        $id = chatGroupUsers::select('chatGroupUsers_id')->where('chatGroupUsers_id', $depId)->first();
                     
                    }while(!empty($id));
                }
            
                    $newId = $chatGroupId . 'CGU' . $latestorder;
                    
                    chatGroupUsers::insert([
                        'chatGroupUsers_id' => $newId,
                        'chatGroup_id' => $chatGroupId,
                        'resident_id' => $user['resident_id'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
        

            }
            $cgID = $chatGroupId;
    
            return $cgID;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $action ='updated a chatGroupUsers where id-'. $id;

        $resident = resident::where('resident_id', $request['resident_id'])->first();
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

        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
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

        $action ='deleted a chatGroupUsers-';
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        
  
        chatGroupUsers::destroy($id);

       
       return response('deleted');
    }

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
                ];
            }
        }
    
        return $formattedGroups;
    }
    
    
    /**
     * Retrieve all users in a chat group.
     *
     * @param int $chatGroup_id The ID of the chat group.
     * @return \Illuminate\Support\Collection|array|string|null The collection of resident IDs in the chat group, or a string indicating that the chat group does not exist.
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


    public function addResidents(request $request){
        $chatGroup = chatGroup::where('chatGroup_id', $request['chatGroup_id'])->first();
        if($chatGroup == null){
            return response('chatGroup does not exist');
        }

        $residents = $this->allUsersinGroup($request['chatGroup_id'])->toArray();

        $unassignedResidents = resident::whereNotIn('resident_id', $residents)->get();
        return response()->json($unassignedResidents);
    }

    public function firstAddResidents(request $request){
        $user = Auth::user();

        $chatGroupIds = chatGroupUsers::select('chatGroup_id')
                                    ->groupBy('chatGroup_id')
                                    ->havingRaw('COUNT(DISTINCT resident_id) = 2')
                                    ->havingRaw('COUNT(resident_id) = 2')
                                    ->pluck('chatGroup_id');


        $assignedResidents = chatGroupUsers::whereIn('chatGroup_id', $chatGroupIds)
                                    ->where('resident_id' , '!=' , $user['resident_id'])
                                    ->pluck('resident_id');

        $unassignedResidents = resident::whereNotIn('resident_id', $assignedResidents)->get();

        return response()->json($unassignedResidents);
    }
}