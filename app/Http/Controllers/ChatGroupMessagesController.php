<?php

namespace App\Http\Controllers;

use App\Models\ChatGroupMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ChatGroupMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ChatGroupMessages::all();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $latestorder = ChatGroupMessages::all()->count();
        $currentId = $request['chatGroup_id'] . 'CGM' . $latestorder;

        $chatGroupUsers = new ChatGroupUsersController;

        $groupUsers = $chatGroupUsers->allUsersinGroup($request['chatGroup_id'])->toArray();
        if(!in_array($user['resident_id'],  $groupUsers) ){
            return 'USER ISNT PART OF THIS GROUP';
        }

        if( !empty(ChatGroupMessages::select('chatGroupMessages_id')->where('chatGroupMessages_id', $currentId)->first()->chatGroupMessages_id)){
            do{
                $latestorder++;
                $depId = $request['chatGroup_id'] . 'CGM' . $latestorder;
                $id = ChatGroupMessages::select('chatGroupMessages_id')->where('chatGroupMessages_id', $depId)->first();
             
            }while(!empty($id));
        }
    
            $newId = $request['chatGroup_id'] . 'CGM' . $latestorder;


            ChatGroupMessages::insert([
                'chatGroupMessages_id' => $newId,
                'message' => $request['message'],   
                'chatGroup_id' => $request['chatGroup_id'],
                'resident_id' => $user['resident_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
    
            $action ='created a new chatGroupMESSAGE';
    
            $user = Auth::user();
            if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $action);
            }

            return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(ChatGroupMessages $chatGroupMessages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $action ='updated a ChatGroupMessages where id-'. $id;

        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }

        ChatGroupMessages::where('chatGroupMessages_id', $id)->update([
            'message' => $request['message'],   
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
        $action ='deleted a chatGroupMessage-';
        
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
  
        ChatGroupMessages::destroy($id);

       
       return response('deleted');
    }

    public function getGroupMessages($chatGroup_id){

      

        $messages = ChatGroupMessages::where('chatGroup_id', $chatGroup_id)->orderBy('created_at', 'desc')->limit(30)->get();


        return $messages;
    }
}
