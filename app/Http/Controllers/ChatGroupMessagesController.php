<?php

namespace App\Http\Controllers;

use App\Models\chatGroupMessages;
use App\Models\chatGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Resident;
use Illuminate\Support\Facades\Validator;
class ChatGroupMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = chatGroupMessages::all();
        return $data;
    }
    /**
     * Store a new chat group message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(Request $request)
    {
        $user = Auth::user();
        $latestorder = chatGroupMessages::all()->count();
        $currentId = $request['chatGroup_id'] . 'CGM' . $latestorder;

        $chatGroupUsers = new ChatGroupUsersController;

        $groupUsers = $chatGroupUsers->allUsersinGroup($request['chatGroup_id'])->toArray();
        if (!in_array($user['resident_id'],  $groupUsers)) {
            return response()->json('USER ISNT PART OF THIS GROUP', 200);
        }

        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'chatGroup_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if (!empty(chatGroupMessages::select('chatGroupMessages_id')->where('chatGroupMessages_id', $currentId)->first()->chatGroupMessages_id)) {
            do {
                $latestorder++;
                $depId = $request['chatGroup_id'] . 'CGM' . $latestorder;
                $id = chatGroupMessages::select('chatGroupMessages_id')->where('chatGroupMessages_id', $depId)->first();
            } while (!empty($id));
        }

        $newId = $request['chatGroup_id'] . 'CGM' . $latestorder;

        chatGroupMessages::insert([
            'chatGroupMessages_id' => $newId,
            'message' => $request['message'],
            'chatGroup_id' => $request['chatGroup_id'],
            'resident_id' => $user['resident_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $action = 'created a new chatGroupMESSAGE';

        $user = Auth::user();
        if ($user['role'] != 'admin') {
            $log = new ResActionLogController;
            $log->store(Auth::user(), $action);
        }

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

        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'chatGroup_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $chatGroup = Chatgroup::where('chatGroup_id', $request['chatGroup_id'])->first();
        if ($chatGroup == null) {
            return response()->json(['error' => 'no chatGroup like this'], 400);
        }

        $existingAssignment = chatGroupMessages::where('chatGroupMessages_id', $id)
                ->where('chatGroup_id', $request['chatGroup_id'])
                ->first();

        if ($existingAssignment == null) {
           return response()->json(['error' => 'no messages like this'], 400);
        }
        
        $action ='updated a chatGroupMessages where id-'. $id;

        $user = Auth::user();
        if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $action);
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
        $action ='deleted a chatGroupMessage-';
        
        $user = Auth::user();
        if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $action);
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

}
