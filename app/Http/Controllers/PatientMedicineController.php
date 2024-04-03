<?php

namespace App\Http\Controllers;

use App\AppConstants;
use App\Models\patient_medicine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\medicine;
use Illuminate\Support\Facades\Validator;

class PatientMedicineController extends Controller
{
    
    /**
     * Retrieve all patient medicines that are not deleted.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $data = patient_medicine::where('isDeleted', false)->get;
        return $data;
    }


    /**
     * Store a new patient medicine record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->ValidatePatientMedicine($request) == false){
            return response('invalid input');
        }

        $newId = $this->createNewId($request);
        $formattedDate = Carbon::parse($request['patientMedicineDate'])->format('Y-m-d H:i:s');

        patient_medicine::insert([
            'patientMedicine_id' =>  $newId,
            'patientMedicineDate' => $formattedDate, // Use the formatted date
            'medicine_frequency' => $request['medicine_frequency'],
            'patient_id' => $request['patient_id'],
            'medicine_id' => $request['medicine_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $action = new AppConstants;
        $this->LogAction($action->add, $request['medicine_id'], $request['patient_id']);
        return response('stored');
    }

    /**
     * Update a patient's medicine record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($this->ValidatePatientMedicine($request) == false){
            return response('invalid input');
        }

        $patientMed = patient_medicine::where('patientMedicine_id', $id)->where('isDeleted', false)->first();
        if (!$patientMed) {
            return response('not found');
        }
        
        $formattedDate = Carbon::parse($request['patientMedicineDate'])->format('Y-m-d H:i:s');
        
        patient_medicine::where('patientMedicine_id', $id)->where('isDeleted', false)->update(
            [
                'patientMedicineDate' => $formattedDate,
                'medicine_frequency' => $request['medicine_frequency'],
                'patient_id' => $request['patient_id'],
                'medicine_id' => $request['medicine_id'],

                'updated_at' => now(),
            ]);

        $action = new AppConstants;
        $this->LogAction($action->update,  $patientMed->medicine_id, $patientMed->patient_id);
        return response('updated');
    }

    /**
     * Delete a patient's medicine record.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patientMed = patient_medicine::where('patientMedicine_id', $id)->where('isDeleted', false)->first();
        if (!$patientMed) {
            return response('not found');
        }

        $action = new AppConstants;
        $this->LogAction($action->delete, $patientMed->medicine_id, $patientMed->patient_id);

        patient_medicine::destroy($id);
        return response('deleted');
    }

    /**
     * Retrieves patient medicines by patient ID.
     *
     * @param int $patientId The ID of the patient.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the patient medicines.
     */
    public function getPatientMedicinesByPatientId($patientId)
    {
        try {
            // Retrieve patient medicines from the database
            $patientMedicines = patient_medicine::where('patient_id', $patientId)->where('isDeleted', false)->get();

            // Fetch medicine details for each patient medicine
            foreach ($patientMedicines as $medication) {
                $medicine = medicine::where('isDeleted', false)->find($medication->medicine_id); 
                if ($medicine) {
                    $medication->medicine_name = $medicine->medicine_name;
                    $medication->medicine_dosage = $medicine->medicine_dosage;
                    $medication->medicine_type = $medicine->medicine_type;
                } else {
                    $medication->medicine_name = null;
                    $medication->medicine_dosage = null;
                    $medication->medicine_type = null;
                }
            }

            // Return the patient medicines as a JSON response
            return response()->json($patientMedicines);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['error' => 'Error fetching patient medicines.'], 500);
        }
    }

    /**
     * Deletes a patient medicine by ID.
     *
     * @param int $id The ID of the patient medicine.
     * @return \Illuminate\Http\Response The response indicating the success of the deletion.
     */
    public function delete($id)
    {
        // Check if the patient medicine exists
        $patientMed = patient_medicine::where('patientMedicine_id', $id)->where('isDeleted', false)->first();
        if (!$patientMed) {
            return response('not found');
        }

        // Update the patient medicine to mark it as deleted
        patient_medicine::where('patientMedicine_id', $id)->update(
            [
                'isDeleted' => true,
                'updated_at' => now()
            ]);

        // Log the deletion action
        $action = new AppConstants;
        $this->LogAction($action->delete, $id, $patientMed->patient_id);

        // Return a response indicating the successful deletion
        return response('deleted');
    }

    /**
     * Validates the patient medicine request.
     *
     * @param Request $request The request object.
     * @return bool Returns true if the validation passes, false otherwise.
     */
    private function ValidatePatientMedicine(Request $request){
        // Validation rules for the request data
        $validator = Validator::make($request->all(), [
            'patientMedicineDate' => ['required', 'date'],
            'medicine_frequency' => ['required', 'string', 'max:255'],
            'patient_id' => ['required', 'string', 'max:50'],
            'medicine_id' => ['required', 'string', 'max:50'],
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }

    /**
     * Logs the action performed on the patient medicine.
     *
     * @param string $action The action performed.
     * @param string $medicineid The medicine ID.
     * @param string $patientId The patient ID.
     * @return void
     */
    private function LogAction($action, $medicineid, $patientId){
        $newAction = $action.' medicine - '. $medicineid . ' patient - ' . $patientId;
        $user = Auth::user();
        if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $newAction);
        }
    }

    /**
     * Creates a new ID for the patient medicine.
     *
     * @param Request $request The request object.
     * @return string The newly created ID.
     */
    private function createNewId(Request $request){
        // Get the latest order count for the patient and medicine combination
        $latestorder = patient_medicine::where('patient_id', $request['patient_id'])->where('medicine_id', $request['medicine_id'])->count();
       
        $currentId =  $request['patient_id'] . $request['medicine_id'] .'-'. $latestorder;

        // Check if the current ID already exists in the database
        if( !empty( patient_medicine::select('patientMedicine_id')->where('patientMedicine_id', $currentId)->first()->patientMedicine_id )){
            // If it exists, generate a new ID by incrementing the order count
            do{
                $latestorder++;
                $depId = $request['patient_id'] . $request['medicine_id'] .'-'. $latestorder;
                $id = patient_medicine::select('patientMedicine_id')->where('patientMedicine_id', $depId)->first();
             
            }while(!empty($id));
        }

        $newId =  $request['patient_id'] . $request['medicine_id'] .'-'. $latestorder;
        return $newId;
    }
    
}
  