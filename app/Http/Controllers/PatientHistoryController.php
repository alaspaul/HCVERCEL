<?php

namespace App\Http\Controllers;

use App\Models\patient_history;
use Illuminate\Http\Request;

class PatientHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            
        $data = patient_history::all();
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
        patient_history::insert([
            'patientHistory_id' => $request['patientHistory_id'],
            'history_id' => $request['history_id'],
            'patient_id' => $request['patient_id'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(patient_history $patient_history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(patient_history $patient_history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, patient_history $patient_history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        patient_history::destroy($id);

       
        return response('deleted');
    }

    public function updatePatientHistory(Request $request, $id)
    {
       
        
        patient_history::where('patientHistory_id', $id)->update(
            [
                'history_id' => $request['history_id'],
                'patient_id' => $request['patient_id'],
    

                'updated_at' => now(),
        ]);

        return response('done');
    }
}
