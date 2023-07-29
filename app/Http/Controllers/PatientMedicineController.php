<?php

namespace App\Http\Controllers;

use App\Models\patient_medicine;
use Illuminate\Http\Request;

class PatientMedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = patient_medicine::all();
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
        patient_medicine::insert([
            'patientMedicine_id' => $request['patientMedicine_id'],
            'patientMedicineDate' => $request['patientMedicineDate'],
            'patientMedicine_frequency' => $request['patientMedicine_frequency'],
            'patient_id' => $request['patient_id'],
            'medicine_id' => $request['medicine_id'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(patient_medicine $patient_medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(patient_medicine $patient_medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        patient_medicine::where('labResults_id', $id)->update(
            [
                'patientMedicine_id' => $request['patientMedicine_id'],
                'patientMedicineDate' => $request['patientMedicineDate'],
                'patientMedicine_frequency' => $request['patientMedicine_frequency'],
                'patient_id' => $request['patient_id'],
                'medicine_id' => $request['medicine_id'],

                'updated_at' => now(),
            ]);

        return response('updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        patient_medicine::destroy($id);

       
        return response('deleted');
    }
}
