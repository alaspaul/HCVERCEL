<?php

namespace App\Http\Controllers;

use App\Models\resident_assigned_room;
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
    {
        resident_assigned_room::insert([
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
    public function show(resident_assigned_room $resident_assigned_room)
    {
        //
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

}
