<?php

namespace App\Http\Controllers;

use App\Models\resident_assigned_room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResidentAssignedRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           
        $data = resident_assigned_room::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   $time = now();
        $date = new Carbon( $time ); 


        resident_assigned_room::insert([
            'resAssRoom_id' => $date->year . $request['resident_id'] .  $request['room_id'],
            'resident_id' => $request['resident_id'],
            'room_id' => $request['room_id'],
            'isFinished' => $request['isFinished'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($resident_id)
    {
        $assignedRooms = resident_assigned_room::where('resident_id', $resident_id)->get();


        return response()->json($assignedRooms);
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(resident_assigned_room $resident_assigned_room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, resident_assigned_room $resident_assigned_room)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        resident_assigned_room::destroy($id);

       
       return response('deleted');
    }

    public function updatePInfo(Request $request, $id)
    {
       
        
        resident_assigned_room::where('ressAssRoom_id', $id)->update(
            [

            'room_id' => $request['room_id'],
            'resident_id' => $request['resident_id'],
            'isFinished' => $request['isFinished'],



            'updated_at' => now(),
        ]);

        return response('done');
    }



    public function showRessAssRoom($id)
    {
        $rooms = resident_assigned_room::where('resident_id', $id)->get();


        return response()->json($rooms);
    
    }

}
