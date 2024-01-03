<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\PhysicalExam_Attributes;
use App\Models\PhysicalExam_categories;
use App\Models\PhysicalExam_values;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class PhysicalExamValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PhysicalExam_values::all();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = PhysicalExam_Attributes::all();
        $patient = Patient::where('patient_id', $request['patient_id'])->first();

        foreach($attributes as $attribute){
        $latestOrder = 0;
        $exit = 0;

        while($exit == 0){
            $thisId = $request['patient_id'] . $attribute['PEA_id'] . '-' . $latestOrder;
            if(!empty(PhysicalExam_values::where('PAV_id', $thisId)->first()->PAV_id)){
                $exit = 0;
                $latestOrder++; 
            }else{
                $exit = 1;
            }
        }
    
        $newId = $request['patient_id'] . $attribute['PEA_id'] . '-' . $latestOrder;

         if(!empty($request[$attribute['PEA_name']])){
            PhysicalExam_values::insert([
           
            'PAV_id' => $newId,
            'PAV_value' => $request[$attribute['PEA_name']],
            'patient_id' => $request['patient_id'],
            'PEA_id' => $attribute['PEA_id'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);


       }else{
        $variable = 0;
        if($attribute['PEA_dataType'] == 'string'){
            $variable = 'none';
        }
        PhysicalExam_values::insert([
           
            'PAV_id' => $newId,
            'PAV_value' =>  $variable,
            'patient_id' => $request['patient_id'],
            'PEA_id' => $attribute['PEA_id'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
        $action ='added a new physical exam for Patient ' . $patient['patient_fName'];
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(PhysicalExam_values $physicalExam_values)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhysicalExam_values $physicalExam_values)
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

        PhysicalExam_values::destroy($id);

       
        return response('deleted');
    }


    public function getPE($patient_id){
        $latestDate = PhysicalExam_values::select('created_at')->distinct()->orderBy('created_at', 'desc')->pluck('created_at');
        $date = new Carbon($latestDate[0]);
        $formattedDate = $date->format('Y-m-d');
    
        $PE = PhysicalExam_values::where('patient_id', $patient_id)->where('created_at', 'LIKE', $formattedDate. '%')->get();

        $result = $PE->map(function ($item) {
            $PEA_id = $item['PEA_id'];
            $attribute_Name = PhysicalExam_Attributes::where('PEA_id', $PEA_id)->value('PEA_name');
            $physicalExam_id = PhysicalExam_Attributes::where('PEA_id', $PEA_id)->value('physicalExam_id');
            $category_Name = PhysicalExam_categories::where('physicalExam_id', $physicalExam_id)->value('PE_name');
    
            return [
                'created_at' => $item['created_at'],
                'category_Name' => $category_Name,
                'attribute_Name' => $attribute_Name,
                'value' => $item['PAV_value'],
            ];
        });
    

        return response()->json($result);
    }


    public function getPEM($patient_id){
        $latestDate = PhysicalExam_values::select('created_at')->distinct()->orderBy('created_at', 'desc')->pluck('created_at');
        $date = new Carbon($latestDate[0]);
        $formattedDate = $date->format('Y-m-d');
    
        $PE = PhysicalExam_values::where('patient_id', $patient_id)->where('created_at', 'LIKE', $formattedDate. '%')->get();

    

        return response()->json($PE);
    }
}
