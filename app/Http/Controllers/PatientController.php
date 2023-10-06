<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = patient::all();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $time = now();
        $date = new Carbon( $time ); 
        
        $latestorder = patient::all()->count();
        $last_id = patient::select('patient_id')->orderBy('created_at', 'desc')->first()->patient_id;
        $currentId = $date->year  . 'P' . $latestorder;

        if( !empty(patient::select('patient_id')->where('patient_id', $currentId)->first()->patient_id)){
        do{
            $latestorder++;
            $patientId = $date->year  . 'P' . $latestorder;
            $id = patient::select('patient_id')->where('patient_id', $patientId)->first();
         
        }while(!empty($id));
        }
         $newId = $date->year  . 'P' . $latestorder;
        
         $patient = new patient([
            'patient_id' =>  $newId,
            'patient_fName' => $request['patient_fName'],
            'patient_lName' => $request['patient_lName'],
            'patient_mName' => $request['patient_mName'],
            'patient_age' => $request['patient_age'],
            'patient_sex' => $request['patient_sex'],

            'created_at' => now(),
            'updated_at' => now(),
         ]);
         
         $patient->save();

        PatAssRoomController::store($newId, $request['room_id']);
        PhrAttributeValuesController::store($request, $newId);


        $action ='added a new patient-'. $request['patient_fName'];
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);

        return response('stored');
    }

    /*
     * Display the specified resource.
     */
    public function show($patient_id)
    {
        try{
            $patient = patient::where('patient_id',$patient_id)->first();
            if($patient == null){
                return 'no matches';
            }
            return response()->json($patient);
        }catch(\Exception $e){
            return response()->json(['error'=>'patient not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($patient_id, Request $request)
    {   
        

        $data = $request->all();
        $dateToUpdate = array();
        
        foreach($data as $name => $value){
            $dataToUpdate[$name] = $value;
        }


        patient::where('patient_id', $patient_id)->update($dataToUpdate);

        return response()->json('patient updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lname = patient::select('patient_lName')->where('patient_id', $id)->first()->patient_lName;
        $fname = patient::select('patient_fName')->where('patient_id', $id)->first()->patient_fName;
        $action ='deleted a patient-'. $lname. $fname;
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        patient::destroy($id);

       
        return response('deleted');
    }

    public function getPatientName($patient_id)
    {
        try{
            $patient = patient::where('patient_id',$patient_id)->first();
            if($patient == null){
                return 'no matches';
            }
            return ['patient_fName'=>$patient['patient_fName'],'patient_lName'=>$patient['patient_lName']];
        }catch(\Exception $e){
            return response()->json(['error'=>'patient not found'], 404);
        }
    }

    public function getPatientbyId($patient_id){
        $patient = patient::where('patient_id', $patient_id)->first();

        return response()->json($patient);
    }
    

}
