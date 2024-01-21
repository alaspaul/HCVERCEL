<?php

namespace App\Http\Controllers;

use App\Models\Vital;
use Illuminate\Http\Request;

class VitalController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = vital::all();

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
        vital::insert([
            'patientVital_id' => $request['patientVital_id'],
            'patientVital_Bp' => $request['patientVital_Bp'],
            'patientVital_temp' => $request['patientVital_temp'],
            'patientVital_pulseRate' => $request['patientVital_pulseRate'],
            'patientVital_breathingRate' => $request['patientVital_breathingRate'],
            'patient_id' => $request['patient_id'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect(route('vital.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(vital $vital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $vital = vital::where('vital_id', $id)->get();
        return view('editDep')->with('vital', $vital);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
        
        vital::where('vital_id', $id)->update(
            [
                'vital_name' => $request['vital_name'],
                'vital_building' => $request['vital_building'],
                'vital_type' => $request['vital_type'],
                'vital_price' => $request['vital_price'],
                'floor_id' => $request['floor_id'],
                

                'updated_at' => now(),
                ]

        );

        return redirect(route('vital.index'))->with('message','dep has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       vital::destroy($id);

       return redirect(route('vital.index'))->with('message','dep has been deleted');
    }


    public function updateVital(Request $request, $id)
    {
       
        
        vital::where('vital_id', $id)->update(
            [

                'patientVital_Bp' => $request['patientVital_Bp'],
                'patientVital_temp' => $request['patientVital_temp'],
                'patientVital_pulseRate' => $request['patientVital_pulseRate'],
                'patientVital_breathingRate' => $request['patientVital_breathingRate'],
                'patient_id' => $request['patient_id'],
    
        
                'updated_at' => now(),
                ]
        );

        return redirect(route('vital.index'))->with('message','dep has been updated');
    }


}
