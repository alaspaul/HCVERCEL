<?php

namespace App\Http\Controllers;

use App\AppConstants;
use App\Models\chatGroupMessages;
use App\Models\chatGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Resident;
use Illuminate\Support\Facades\Validator;
class ChatGroupMessagesController extends Controller
{
    /**
     * Retrieves all chat group messages.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $data = chatGroupMessages::all();
        return $data;
    }

    /**
     * Stores a new chat group message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $valid = $this->ValidateChatGroupMessages($request);
        if($valid == false){
            return response('invalid input');
        }

        $chatGroup = chatGroup::where('chatGroup_id', $request['chatGroup_id'])->first();
        if ($chatGroup == null) {
            return response('not found');
        }

        $chatGroupUsers = new ChatGroupUsersController;

        $groupUsers = $chatGroupUsers->allUsersinGroup($request['chatGroup_id'])->toArray();
        if (!in_array($user['resident_id'],  $groupUsers)) {
            return response('USER ISNT PART OF THIS GROUP');
        }

        $newId = $this->createNewId($request);

        chatGroupMessages::insert([
            'chatGroupMessages_id' => $newId,
            'message' => $request['message'],
            'chatGroup_id' => $request['chatGroup_id'],
            'resident_id' => $user['resident_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response()->json(['chatGroup_id' => $request['chatGroup_id']], 200);
    }

 
    /**
     * Update a chat group message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $valid = $this->ValidateChatGroupMessages($request);
        if($valid == false){
            return response('invalid input');
        }

        $chatGroup = chatGroup::where('chatGroup_id', $request['chatGroup_id'])->first();
        if ($chatGroup == null) {
            return response('not found');
        }

        $existingAssignment = chatGroupMessages::where('chatGroupMessages_id', $id)
                ->where('chatGroup_id', $request['chatGroup_id'])
                ->first();

        if ($existingAssignment == null) {
           return response()->json(['error' => 'no messages like this'], 400);
        }
    
        $chatGroupUsers = new ChatGroupUsersController;
        $groupUsers = $chatGroupUsers->allUsersinGroup($request['chatGroup_id'])->toArray();
        if (!in_array($user['resident_id'],  $groupUsers)) {
            return response('USER ISNT PART OF THIS GROUP');
        }

        chatGroupMessages::where('chatGroupMessages_id', $id)->update([
            'message' => $request['message'],   
            'chatGroup_id' => $request['chatGroup_id'],
            'resident_id' => $user['resident_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response('done');
    }

    /**
     * Destroy a chat group message.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        chatGroupMessages::where('chatGroupMessages_id', $id)->first();
        if ($id == null) {
            return response('not found');
        }
      
        chatGroupMessages::destroy($id);
        return response('deleted');
    }
    /**
     * Retrieves the group messages for a given chat group ID.
     *
     * @param int $chatGroup_id The ID of the chat group.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the group messages.
     */
    public function getGroupMessages($chatGroup_id){

        $messages = (new ChatGroupMessagesController)->getGroupMessagesWithNames($chatGroup_id);
        return response()->json($messages, 200);
    }

    /**
     * Retrieves group messages with sender names.
     *
     * @param int $chatGroup_id The ID of the chat group.
     * @return array The array of group messages with sender names.
     */
    public function getGroupMessagesWithNames($chatGroup_id)
    {
        // Fetch messages with sender information
        $messages = chatGroupMessages::where('chatGroup_id', $chatGroup_id)
            ->orderBy('created_at', 'asc')
            ->get();

        $result = [];

        foreach ($messages as $message) {
            // Fetch sender's information
            $sender = Resident::select('resident_fName', 'resident_lName')
                ->where('resident_id', $message->resident_id)
                ->first();

            // Add sender and receiver names to the result
            $result[] = [
                'message' => $message->message,
                'sender' => [
                    'resident_id' => $message->resident_id,
                    'resident_fName' => $sender->resident_fName,
                    'resident_lName' => $sender->resident_lName,
                ],
                'created_at' => $message->created_at,
            ];
        }

        return $result;
    }
    /**
     * Validates the chat group messages request.
     *
     * @param Request $request The request object.
     * @return bool Returns true if the request is valid, false otherwise.
     */
    private function ValidateChatGroupMessages(Request $request){
        // Validation rules for the request parameters
        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'chatGroup_id' => 'required',
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }


    /**
     * Creates a new ID for the chat group message.
     *
     * @param Request $request The request object.
     * @return string The newly generated ID.
     */
    private function createNewId(Request $request){

        // Generate a unique ID for the chat group message
        $latestorder = chatGroupMessages::all()->count();
        $currentId = $request['chatGroup_id'] . 'CGM' . $latestorder;

        if (!empty(chatGroupMessages::select('chatGroupMessages_id')->where('chatGroupMessages_id', $currentId)->first()->chatGroupMessages_id)) {
            do {
                $latestorder++;
                $depId = $request['chatGroup_id'] . 'CGM' . $latestorder;
                $id = chatGroupMessages::select('chatGroupMessages_id')->where('chatGroupMessages_id', $depId)->first();
            } while (!empty($id));
        }

        $newId = $request['chatGroup_id'] . 'CGM' . $latestorder;

        return $newId;
    }

}
