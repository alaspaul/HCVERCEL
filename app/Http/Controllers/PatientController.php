<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Patient::all();
    
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $time = now();
        $date = new Carbon( $time ); 
        
        $latestorder = Patient::all()->count();
        $currentId = $date->year  . 'P' . $latestorder;

        if( !empty(Patient::select('patient_id')->where('patient_id', $currentId)->first()->patient_id)){
        do{
            $latestorder++;
            $patientId = $date->year  . 'P' . $latestorder;
            $id = Patient::select('patient_id')->where('patient_id', $patientId)->first();
         
        }while(!empty($id));
        }
         $newId = $date->year  . 'P' . $latestorder;
        
         Patient::insert([
            'patient_id' =>  $newId,
            'patient_fName' => $request['patient_fName'],
            'patient_lName' => $request['patient_lName'],
            'patient_mName' => $request['patient_mName'],
            'patient_age' => $request['patient_age'],
            'patient_sex' => $request['patient_sex'],

            'created_at' => now(),
            'updated_at' => now(),
         ]);
         

        $PatAssRoomController = new PatAssRoomController;
        $PatAssRoomController->store($newId, $request['room_id']);

        $PhrAttributeValuesController = new PhrAttributeValuesController;
        $PhrAttributeValuesController->store($request, $newId);
        

        $action ='added a new Patient-'. $request['patient_fName'];
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }


        return response('stored');
    }

    /*
     * Display the specified resource.
     */
    public function show($patient_id)
    {
        try{
            $patient = Patient::where('patient_id',$patient_id)->first();
            if($patient == null){
                return 'no matches';
            }
            return response()->json($patient);
        }catch(\Exception $e){
            return response()->json(['error'=>'Patient not found'], 404);
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

        Patient::where('patient_id', $patient_id)->update($dataToUpdate);

        return response()->json('Patient updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lname = Patient::select('patient_lName')->where('patient_id', $id)->first()->patient_lName;
        $fname = Patient::select('patient_fName')->where('patient_id', $id)->first()->patient_fName;
        $action ='deleted a Patient-'. $lname. $fname;
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }

      
        Patient::destroy($id);

       
        return response('deleted');
    }

    public function getPatientName($patient_id)
    {
        try{
            $patient = Patient::where('patient_id',$patient_id)->first();
            if($patient == null){
                return 'no matches';
            }
            return ['patient_fName'=>$patient['patient_fName'],'patient_lName'=>$patient['patient_lName']];
        }catch(\Exception $e){
            return response()->json(['error'=>'Patient not found'], 404);
        }
    }

    public function getPatientbyId($patient_id){
        $patient = Patient::where('patient_id', $patient_id)->first();

        return $patient;
    }



    public function getPatientRoom($patient_id){
        $par = new PatAssRoomController;
        $room = $par->getRoombyPatient($patient_id);

        return $room;
    }

    public function addPhr(request $request, $patient_id){
        $PhrAttributeValuesController = new PhrAttributeValuesController;
        $PhrAttributeValuesController->store($request, $patient_id);

        return response('phr added');
    }


    

}
