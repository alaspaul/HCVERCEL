<?php

namespace App\Http\Controllers;

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
        $currentId = $request['chatGroup_id'] . 'CGU' . $latestorder;


        if( !empty(chatGroupUsers::select('chatGroupUsers_id')->where('chatGroupUsers_id', $currentId)->first()->chatGroupUsers_id)){
            do{
                $latestorder++;
                $depId = $request['chatGroup_id'] . 'CGU' . $latestorder;
                $id = chatGroupUsers::select('chatGroupUsers_id')->where('chatGroupUsers_id', $depId)->first();
             
            }while(!empty($id));
        }
    
            $newId = $request['chatGroup_id'] . 'CGU' . $latestorder;
            
            chatGroupUsers::insert([
                'chatGroupUsers_id' => $newId,
                'chatGroup_id' => $request['chatGroup_id'],
                'resident_id' => $request['resident_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

    



            $chatGroupUsers = $this->allUsersinGroup($request['chatGroup_id'])->toArray();
            if(!in_array($user['resident_id'],  $chatGroupUsers) ){
        
                if( !empty(chatGroupUsers::select('chatGroupUsers_id')->where('chatGroupUsers_id', $currentId)->first()->chatGroupUsers_id)){
                    do{
                        $latestorder++;
                        $depId = $request['chatGroup_id'] . 'CGU' . $latestorder;
                        $id = chatGroupUsers::select('chatGroupUsers_id')->where('chatGroupUsers_id', $depId)->first();
                     
                    }while(!empty($id));
                }
            
                    $newId = $request['chatGroup_id'] . 'CGU' . $latestorder;
                    
                    chatGroupUsers::insert([
                        'chatGroupUsers_id' => $newId,
                        'chatGroup_id' => $request['chatGroup_id'],
                        'resident_id' => $user['resident_id'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
        

            }
        
    
            return response('stored');
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
    public function update(Request $request, chatGroupUsers $chatGroupUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(chatGroupUsers $chatGroupUsers)
    {
        //
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
}
