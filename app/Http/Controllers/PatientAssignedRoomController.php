<?php

namespace App\Http\Controllers;

use App\Models\patientAssignedRoom;
use Illuminate\Http\Request;

class PatientAssignedRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $data = patientAssignedRoom::all();
        return $data;    }

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

        patientAssignedRoom::insert([
            'patAssRoom_id' => $request['patAssRoom_id'],
            'dateAdmitted' => $request['dateAdmitted'],
            'room_id' => $request['room_id'],
            'patient_id' => $request['patient_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($resident_id)
    {
        $assignedRooms = patientAssignedRoom::where('resident_id', $resident_id)->get();


        return response()->json($assignedRooms);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(patientAssignedRoom $patientAssignedRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, patientAssignedRoom $patientAssignedRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        patientAssignedRoom::destroy($id);

       
       return response('deleted');
    }
}
