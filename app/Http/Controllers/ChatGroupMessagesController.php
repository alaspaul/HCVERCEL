<?php

namespace App\Http\Controllers;

use App\Models\chatGroupMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $latestorder = chatGroupMessages::all()->count();
        $currentId = $request['chatGroup_id'] . 'CGM' . $latestorder;

        $chatGroupUsers = new ChatGroupUsersController;

        $groupUsers = $chatGroupUsers->allUsersinGroup($request['chatGroup_id'])->toArray();
        if(!in_array($user['resident_id'],  $groupUsers) ){
            return 'USER ISNT PART OF THIS GROUP';
        }

        if( !empty(chatGroupMessages::select('chatGroupMessages_id')->where('chatGroupMessages_id', $currentId)->first()->chatGroupMessages_id)){
            do{
                $latestorder++;
                $depId = $request['chatGroup_id'] . 'CGM' . $latestorder;
                $id = chatGroupMessages::select('chatGroupMessages_id')->where('chatGroupMessages_id', $depId)->first();
             
            }while(!empty($id));
        }
    
            $newId = $request['chatGroup_id'] . 'CGM' . $latestorder;


            $chatGroup = new chatGroupMessages([
                'chatGroupMessages_id' => $newId,
                'message' => $request['message'],   
                'chatGroup_id' => $request['chatGroup_id'],
                'resident_id' => $user['resident_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            $chatGroup->save();
    
            $action ='created a new chatGroupMESSAGE';
    
            $log = new ResActionLogController;
            $log->store(Auth::user(), $action);
    
            return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(chatGroupMessages $chatGroupMessages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, chatGroupMessages $chatGroupMessages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(chatGroupMessages $chatGroupMessages)
    {
        //
    }

    public function getGroupMessages($chatGroup_id){

        $chatGroupMessages = new chatGroupMessages;

        $messages = $chatGroupMessages->where('chatGroup_id', $chatGroup_id)->orderBy('created_at', 'asc')->get();


        return $messages;
    }
}
