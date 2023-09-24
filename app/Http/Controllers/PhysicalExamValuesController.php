<?php

namespace App\Http\Controllers;

use App\Models\patient;
use App\Models\physicalExam_Attributes;
use App\Models\physicalExam_values;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PhysicalExamValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = physicalExam_values::all();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $PEA = physicalExam_Attributes::where('PEA_id', $request['PEA_id'])->first();
        $patient = patient::where('patient_id', $request['patient_id'])->first();
        $latestorder = physicalExam_values::where('patient_id', $request['patient_id'])->where('PEA_id', $request['PEA_id'])->count();
        $currentId =   $patient['patient_id'] . $PEA['PEA_id'] . '-'. $latestorder;

        if( !empty(physicalExam_values::select('PAV_id')->where('PAV_id', $currentId)->first()->PAV_id)){
        do{
            $latestorder++;
            $PAV_id =  $patient['patient_id'] . $PEA['PEA_id'] . '-'. $latestorder;
            $id = physicalExam_values::select('PAV_id')->where('PAV_id', $PAV_id)->first();
         
        }while(!empty($id));
        }
         $newId =  $patient['patient_id'] . $PEA['PEA_id'] . '-'. $latestorder;

         physicalExam_values::insert([
           
            'PAV_id' => $newId,
            'PAV_value' => $request['PAV_value'],
            'patient_id' => $request['patient_id'],
            'PEA_id' => $request['PEA_id'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $action ='added a new value for ' . $PEA['PEA_name'] . ' for patient ' . $patient['patient_fName'];
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);
        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(physicalExam_values $physicalExam_values)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, physicalExam_values $physicalExam_values)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $action ='deleted a Physical Exam Value-'. $id;
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);

        physicalExam_values::destroy($id);

       
        return response('deleted');
    }
}
