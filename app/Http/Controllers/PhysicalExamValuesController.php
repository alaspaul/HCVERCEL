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
        $attributes = physicalExam_Attributes::all();
        $patient = patient::where('patient_id', $request['patient_id'])->first();

        foreach($attributes as $attribute){
        $latestOrder = 0;
        $exit = 0;

        while($exit == 0){
            $thisId = $request['patient_id'] . $attribute['PEA_id'] . '-' . $latestOrder;
            if(!empty(physicalExam_values::where('PAV_id', $thisId)->first()->PAV_id)){
                $exit = 0;
                $latestOrder++; 
            }else{
                $exit = 1;
            }
        }
    
        $newId = $request['patient_id'] . $attribute['PEA_id'] . '-' . $latestOrder;

         if(!empty($request[$attribute['PEA_name']])){
         $PEV = new physicalExam_values([
           
            'PAV_id' => $newId,
            'PAV_value' => $request[$attribute['PEA_name']],
            'patient_id' => $request['patient_id'],
            'PEA_id' => $attribute['PEA_id'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $PEV->save();
    }else{
        $variable = 0;
        if($attribute['PEA_dataType'] == 'string'){
            $variable = 'none';
        }
        $PEV = new physicalExam_values([
           
            'PAV_id' => $newId,
            'PAV_value' =>  $variable,
            'patient_id' => $request['patient_id'],
            'PEA_id' => $attribute['PEA_id'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $PEV->save();
    }
}
        $action ='added a new physical exam for patient ' . $patient['patient_fName'];
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
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
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);

        physicalExam_values::destroy($id);

       
        return response('deleted');
    }
}
