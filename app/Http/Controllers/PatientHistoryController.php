<?php

namespace App\Http\Controllers;

use App\Models\patientHistory;
use Illuminate\Http\Request;

class PatientHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = patientHistory::all();
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
        patientHistory::insert([
            'patientHistory_id' => $request['patientHistory_id'],
            'patient_id' => $request['patient_id'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(patientHistory $patientHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(patientHistory $patientHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        patientHistory::where('patientHistory_id', $id)->update(
            [
                'patientHistory_id' => $request['patientHistory_id'],
                'patient_id' => $request['patient_id'],

                'updated_at' => now(),
            ]);

        return response('updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        patientHistory::destroy($id);

       
        return response('deleted');
    }
}
