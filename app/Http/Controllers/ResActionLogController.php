<?php

namespace App\Http\Controllers;

use App\Models\resActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ResActionLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($user_id, $role, $action)
    {
        $time = now();
        $date = new Carbon( $time ); 

        $latestorder = resActionLog::all()->count();
        $currentId = $date->year .'RA' . $latestorder;


        if( !empty(resActionLog::select('RA_id')->where('RA_id', $currentId)->first()->RA_id)){
        do{
            $latestorder++;
            $depId = $date->year .'RA' . $latestorder;
            $id = resActionLog::select('RA_id')->where('RA_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId =  $date->year .'RA' . $latestorder;

        resActionLog::insert([
            'RA_id' => $newId,
            'action' => $action,
            'role' => $role,
            'user_id' => $user_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

 
        return response('action stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(resActionLog $resActionLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, resActionLog $resActionLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(resActionLog $resActionLog)
    {
        //
    }
}
