<?php

namespace App\Http\Controllers;

use App\Models\patient_info;
use Illuminate\Http\Request;

class PatientInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = patient_info::all();

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
        patient_info::insert([
            'pInfo_id' => $request['pInfo_id'],
            'room_id' => $request['room_id'],
            'patient_id' => $request['patient_id'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

 
        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(patient_info $patient_info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(patient_info $patient_info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, patient_info $patient_info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        patient_info::destroy($id);

       
       return response('deleted');
    }

    
    public function updatePInfo(Request $request, $id)
    {
       
        
        patient_info::where('pInfo_id', $id)->update(
            [

            'room_id' => $request['room_id'],
            'patient_id' => $request['patient_id'],


            'updated_at' => now(),
        ]);

        return response('done');
    }

}
