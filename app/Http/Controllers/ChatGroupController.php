<?php

namespace App\Http\Controllers;

use App\Models\chatGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class ChatGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = chatGroup::all();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()

    {   $time = now();
        $date = new Carbon( $time ); 
        $latestorder = chatGroup::all()->count();
        $currentId = $date->year . 'CG' . $latestorder;

        if( !empty(chatGroup::select('chatGroup_id')->where('chatGroup_id', $currentId)
                                                    ->first()
                                                    ->chatGroup_id)){
            do{
                $latestorder++;
                $depId = $date->year . 'CG' . $latestorder;
                $id = chatGroup::select('chatGroup_id')->where('chatGroup_id', $depId)
                                                       ->first();
             
            }while(!empty($id));
        }
    
            $newId = $date->year . 'CG' . $latestorder;


            chatGroup::insert([
                'chatGroup_id' => $newId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        
    
            $action ='created a new chatGroup';

            $user = Auth::user();
            if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $action);
            }
            
        
            return $newId;
    }

    /**
     * Display the specified resource.
     */
    public function show(chatGroup $chatGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(chatGroup $chatGroup)
    {
        //
    }
}
