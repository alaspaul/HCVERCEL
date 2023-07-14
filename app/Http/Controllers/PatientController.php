<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = patient::all();

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
        patient::insert([
            'patient_id' => $request['patient_id'],
            'patient_fName' => $request['patient_fName'],
            'patient_lName' => $request['patient_fName'],
            'patient_mName' => $request['patient_fName'],
            'patient_age' => $request['patient_age'],
            'patient_sex' => $request['patient_sex'],
            'patient_vaccine_stat' => $request['patient_vaccine_stat'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $patient = patient::where('patient_id', $id)->get();

        return response('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       patient::destroy($id);

       return redirect(route('patients.index'))->with('message','dep has been deleted');
    }


    public function updatePatient(Request $request, $id)
    {
       
        
        
        patient::where('patient_id', $id)->update(
            [            
            'patient_fName' => $request['patient_fName'],
            'patient_lName' => $request['patient_fName'],
            'patient_mName' => $request['patient_fName'],
            'patient_age' => $request['patient_age'],
            'patient_sex' => $request['patient_sex'],
            'patient_vaccine_stat' => $request['patient_vaccine_stat'],

            'updated_at' => now(),
            ]
        );

        return response('updated');
    }

}
