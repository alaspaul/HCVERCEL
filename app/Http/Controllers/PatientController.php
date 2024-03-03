<?php

namespace App\Http\Controllers;

use App\AppConstants;
use App\Models\patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = patient::where('isDeleted', false)->get();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $this->ValidatePatient($request);

        if($valid == false){
            return response('invalid input');
        }

        $patient = patient::where('patient_fName', $request['patient_fName'])
                            ->where('patient_lName', $request['patient_lName'])
                            ->where('patient_mName', $request['patient_mName'])
                            ->where('isDeleted', false)
                            ->get();

        if($patient->isEmpty()){

        $newId = $this->createNewId($request);
        
         patient::insert([
            'patient_id' =>  $newId,
            'patient_fName' => $request['patient_fName'],
            'patient_lName' => $request['patient_lName'],
            'patient_mName' => $request['patient_mName'],
            'patient_age' => $request['patient_age'],
            'patient_sex' => $request['patient_sex'],

            'created_at' => now(),
            'updated_at' => now(),
         ]);

        }else{
            $newId = $patient['patient_id'];
        }

        $PatAssRoomController = new PatAssRoomController;
        $PatAssRoomController->store($newId, $request['room_id']);

        $PhrAttributeValuesController = new PhrAttributeValuesController;
        $PhrAttributeValuesController->store($request, $newId);
        
        $action = new AppConstants;
        $this->LogAction($action->add, $newId);

        return response('stored');
    }

    /**
     * Display the specified resource.
     *
     * @param int $patient_id The ID of the patient to display.
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response The JSON response containing the patient information and the patient room.
     */
    public function show($patient_id)
    {
        $patientRoom = $this->getPatientRoom($patient_id);
        try{
            $patient = patient::where('patient_id',$patient_id)->where('isDeleted', false)->first();
            if($patient == null){
                return response()->json('no matches');
            }
            return response()->json(['patient' => $patient, 'patientRoom' => $patientRoom]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'patient not found']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $patient_id The ID of the patient to update.
     * @param \Illuminate\Http\Request $request The request object containing the updated patient data.
     * @return \Illuminate\Http\Response The response indicating the success or failure of the update operation.
     */
    public function update($patient_id, Request $request)
    {
        $valid = $this->ValidatePatient($request);

        if($valid == false){
            return response('invalid input');
        }

        $patient = patient::where('patient_id', $patient_id)->where('isDeleted', false)->first();

        if($patient == null){
            return response('patient not found');
        }

        $dataToUpdate = [
            'patient_fName' => $request['patient_fName'],
            'patient_lName' => $request['patient_lName'],
            'patient_mName' => $request['patient_mName'],
            'patient_age' => $request['patient_age'],
            'patient_sex' => $request['patient_sex'],
        ];

        patient::where('patient_id', $patient_id)->update($dataToUpdate);

        $action = new AppConstants;
        $this->LogAction($action->edit, $patient_id);

        return response()->json('patient updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id The ID of the patient to be deleted.
     * @return \Illuminate\Http\Response The response indicating the success or failure of the deletion.
     */
    public function destroy($id)
    {
        $patient = patient::where('patient_id', $id)->where('isDeleted', false)->first();

        if($patient == null){
            return response('patient not found');
        }
        
        $action = new AppConstants;
        $this->LogAction($action->delete, $id);

        patient::destroy($id);

        return response('deleted');
    }

    /**
     * Get the name of the patient with the specified ID.
     *
     * @param int $patient_id The ID of the patient.
     * @return string|array The name of the patient or an array containing the first and last name of the patient.
     */
    public function getPatientName($patient_id)
    {
        try{
            $patient = patient::where('patient_id',$patient_id)->where('isDeleted', false)->first();
            if($patient == null){
                return 'no matches';
            }
            return ['patient_fName' => $patient['patient_fName'], 'patient_lName' => $patient['patient_lName']];
        } catch (\Exception $e) {
            return response()->json(['error' => 'patient not found'], 404);
        }
    }

    /**
     * Get the patient with the specified ID and their associated room.
     *
     * @param int $patient_id The ID of the patient.
     * @return \Illuminate\Http\Response The response containing the patient and their associated room.
     */
    public function getPatientbyId($patient_id) {
        $patient = patient::where('patient_id', $patient_id)->where('isDeleted', false)->first();
        if($patient == null){
            return response('patient not found');
        }

        $patientRoom = $this->getPatientRoom($patient_id);
        try {
            $patient = patient::where('patient_id', $patient_id)->firstOrFail();
            return response()->json(['patient' => $patient, 'patientRoom' => $patientRoom]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Patient not found'], 404);
        }
    }
    /**
     * Retrieves the room of a patient.
     *
     * @param int $patient_id The ID of the patient.
     * @return mixed The room of the patient.
     */
    public function getPatientRoom($patient_id)
    {
        $par = new PatAssRoomController;
        $room = $par->getRoombyPatient($patient_id);

        return $room;
    }

    /**
     * Adds a PHR (Personal Health Record) for a patient.
     *
     * @param \Illuminate\Http\Request $request The request object.
     * @param int $patient_id The ID of the patient.
     * @return \Illuminate\Http\Response The response indicating the PHR has been added.
     */
    public function addPhr(request $request, $patient_id)
    {
        $patient = patient::where('patient_id', $patient_id)->where('isDeleted', false)->first();

        if($patient == null){
            return response('patient not found');
        }

        $PhrAttributeValuesController = new PhrAttributeValuesController;
        $PhrAttributeValuesController->store($request, $patient_id);

        return response('phr added');
    }

    /**
     * Deletes a patient.
     *
     * @param int $patient_id The ID of the patient.
     * @return \Illuminate\Http\Response The response indicating the patient has been deleted.
     */
    public function deletePatient($patient_id)
    {
        $patient = patient::where('patient_id', $patient_id)->where('isDeleted', false)->first();

        if($patient == null){
            return response('patient not found');
        }

        $action = new AppConstants;
        $this->LogAction($action->delete, $patient_id);

        patient::where('patient_id', $patient_id)->update(['isDeleted' => true, 'updated_at' => now()]);

        return response('deleted');
    }

    /**
     * Validates the patient data from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool  Returns true if the validation passes, false otherwise.
     */
    private function ValidatePatient(Request $request){

        $validator = Validator::make($request->all(), [
            'patient_fName' => 'required|string|max:255',
            'patient_lName' => 'required|string|max:255',
            'patient_mName' => 'required|string|max:255',
            'patient_age' => 'required|integer',
            'patient_sex' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }

    /**
     * Logs an action performed by a user.
     *
     * @param  string  $action  The action performed.
     * @param  int  $id  The ID associated with the action.
     * @return void
     */
    private function LogAction($action, $id){
        $newAction = $action. ' medicine - '. $id;
        $user = Auth::user();
        if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $newAction);
        }
    }

    /**
     * Creates a new patient ID based on the current date and time.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string  The newly generated patient ID.
     */
    private function createNewId(Request $request){
        $time = now();
        $date = new Carbon($time);

        $latestorder = patient::all()->count();
        $currentId = $date->year  . 'P' . $latestorder;

        if (!empty(patient::select('patient_id')->where('patient_id', $currentId)->first()->patient_id)) {
            do {
                $latestorder++;
                $patientId = $date->year  . 'P' . $latestorder;
                $id = patient::select('patient_id')->where('patient_id', $patientId)->first();
            } while (!empty($id));
        }
        $newId = $date->year  . 'P' . $latestorder;

        return $newId;
    }
}
