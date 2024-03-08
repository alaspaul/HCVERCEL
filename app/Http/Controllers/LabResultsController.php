<?php

namespace App\Http\Controllers;

use App\AppConstants;
use App\Models\lab_results;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LabResultsController extends Controller
{
    /**
     * Retrieve all lab results.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $data = lab_results::where('isDeleted', false)->get();
        return $data;
    }
    public function show(lab_results $lab_results)
    {
        //
    }
    /**
     * Store a new lab result.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $this->ValidateLabResults($request);

        if($valid == false){
            return response('invalid input');
        }

        $newId = $this->createNewId($request);

        lab_results::insert([
            'labResults_id' => $newId,
            'labResultDate' => $request['labResultDate'],
            'results' => $request['results'],
            'patient_id' => $request['patient_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $action = new AppConstants;
        $this->LogAction($action->add, $newId, $request['patient_id']);

        return response('stored');
    }

/**
 * Update the lab results for a specific ID.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
   
    public function update(Request $request, $id)
    {
        $valid = $this->ValidateLabResults($request);

        if($valid == false){
            return response('invalid input');
        }

        $lab = lab_results::where('labResults_id', $id)->where('isDeleted', false)->first();

        if(empty($lab)){
            return response('lab result not found');
        }

        lab_results::where('labResults_id', $id)->update(
            [
                'labResultDate' => $request['labResultDate'],
                'results' => $request['results'],

                'updated_at' => now(),
            ]);

        $action = new AppConstants;
        $this->LogAction($action->edit, $id, $lab['patient_id']);
        return response('updated');
    }
    /**
     * Delete a lab result by its ID.
     *
     * @param  int  $id  The ID of the lab result to delete.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lab = lab_results::where('labResults_id', $id)->where('isDeleted', false)->first();
        if(empty($lab)){
            return response('lab result not found');
        }

        $action = new AppConstants;
        $this->LogAction($action->delete, $id, $lab['patient_id']);

        lab_results::destroy($id);

        return response('deleted');
    }

    /**
     * Soft delete a lab result by its ID.
     *
     * @param  int  $id  The ID of the lab result to soft delete.
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $lab = lab_results::where('labResults_id', $id)->where('isDeleted', false)->first();
        if(empty($lab)){
            return response('lab result not found');
        }

        lab_results::where('labResults_id', $id)->update(
            [
                'isDeleted' => true,
                'updated_at' => now()
            ]);

        $action = new AppConstants;
        $this->LogAction($action->delete, $id, $lab['patient_id']);
        return response('deleted');
    }

    /**
     * Retrieve lab results for the specified patient ID.
     *
     * @param int $patientId The ID of the patient.
     * @return \Illuminate\Database\Eloquent\Collection The collection of lab results.
     */
    public function getPatientLabResultsById($patientId)
    {
        // Retrieve lab results for the specified patient ID
        $labResults = lab_results::where('patient_id', $patientId)->where('isDeleted', false)->get();

        return $labResults;
    }

        /**
     * Validates the medicine data from the request.
     *
     * @param  Illuminate\Http\Request  $request
     * @return bool  Returns true if the validation passes, false otherwise.
     */
    private function ValidateLabResults(Request $request){
        // Validation rules for the medicine data
        $validator = Validator::make($request->all(), [
            'labResultDate' => ['required', 'date'],
            'results' => ['required', 'string', 'max:1000'],
            'patient_id' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }


    /**
     * Logs an action related to a lab result.
     *
     * @param string $action The action to be logged.
     * @param int $labresultId The ID of the lab result.
     * @param int $patientId The ID of the patient.
     * @return void
     */
    private function LogAction($action, $labresultId, $patientId){
        $newAction = $action.' lab result - '. $labresultId . ' patient - ' . $patientId;
        $user = Auth::user();
        if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $newAction);
        }
    }

    /**
     * Creates a new ID for lab results based on the patient ID.
     *
     * @param Request $request The request object containing the patient ID.
     * @return string The newly created lab results ID.
     */

    private function createNewId(Request $request){

        $latestorder = lab_results::where('patient_id', $request['patient_id'])->count();
        $currentId =  $request['patient_id'] . 'L' . $latestorder;


        if( !empty( lab_results::select('labResults_id')->where('labResults_id', $currentId)->first()->labResults_id )){
        do{
            $latestorder++;
            $depId =  $request['patient_id'] . 'L' . $latestorder;
            $id = lab_results::select('labResults_id')->where('labResults_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId =  $request['patient_id'] . 'L' . $latestorder;

        return $newId;
    }
}
