<?php

namespace App\Http\Controllers;

use App\Models\chatGroup;
use App\Models\chatGroupUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

       
        $user = Auth::user();
        $latestorder = chatGroupUsers::all()->count();

        $chatGroupId = $this->ifNew($request['chatGroup_id']);

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
        
    
            return $chatGroupId;
    }

    /**
     * Display the specified resource.
     */
    public function show(chatGroupUsers $chatGroupUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $action ='updated a chatGroupUsers where id-'. $id;

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
        $action ='deleted a chatGroupUsers-';
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        
  
        chatGroupUsers::destroy($id);

       
       return response('deleted');
    }

    public function allGroups(){
        $user = Auth::user();

        $myGroups = chatGroupUsers::where('resident_id', $user['resident_id'])->pluck('chatGroup_id');

        return $myGroups;
    }

    public function allUsersinGroup($groupChat_id){

        $groupUsers = chatGroupUsers::where('chatGroup_id', $groupChat_id)->pluck('resident_id');

        return $groupUsers;
    }


    public function ifNew($variable){
        if($variable != null){
            return $variable;
        }else{
            $chatGroup = new ChatGroupController;

            $newid = $chatGroup->store();


            return $newid;
        }


    }
}
