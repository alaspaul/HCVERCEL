<?php

namespace App\Http\Controllers;

use App\Models\Patient_medicine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data = Patient_medicine::all();
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
        $time = now();
        $date = new Carbon( $time ); 

        $latestorder = Patient_medicine::where('patient_id', $request['patient_id'])->where('medicine_id', $request['medicine_id'])->count();
       
        $currentId =  $request['patient_id'] . $request['medicine_id'] .'-'. $latestorder;


        if( !empty( Patient_medicine::select('patientMedicine_id')->where('patientMedicine_id', $currentId)->first()->patientMedicine_id )){
        do{
            $latestorder++;
            $depId = $request['patient_id'] . $request['medicine_id'] .'-'. $latestorder;
            $id = Patient_medicine::select('patientMedicine_id')->where('patientMedicine_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId =  $request['patient_id'] . $request['medicine_id'] .'-'. $latestorder;

        Patient_medicine::insert([
            'patientMedicine_id' =>  $newId,
            'patientMedicineDate' => $request['patientMedicineDate'],
            'medicine_frequency' => $request['medicine_frequency'],
            'patient_id' => $request['patient_id'],
            'medicine_id' => $request['medicine_id'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        

        $medicineController = new medicineController;
        $medName = $medicineController->getMedNamebyId($request['medicine_id']);

        $patientController = new patientController;
        $patient = $patientController->getPatientbyId($request['patient_id']);
        $patientName = $patient['patient_lName'] .', '. $patient['patient_fName'] .' '. $patient['patient_mName'];

        $action ='added a new medicine-'. $medName .' for patient-'. $patientName;
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient_medicine $patient_medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient_medicine $patient_medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Patient_medicine::where('patientMedicine_id', $id)->update(
            [
                'patientMedicine_id' => $request['patientMedicine_id'],
                'patientMedicineDate' => $request['patientMedicineDate'],
                'patientMedicine_frequency' => $request['patientMedicine_frequency'],
                'patient_id' => $request['patient_id'],
                'medicine_id' => $request['medicine_id'],

                'updated_at' => now(),
            ]);

        $action ='updated a medicine-'. $request['medicine_id'] .' for patient-'. $request['patient_id'];
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
        return response('updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $meds = Patient_medicine::where('patientMedicine_id', $id)->first();

        $medicineController = new medicineController;
        $medicineName =  $medicineController->getMedNamebyId($meds['medicine_id']);

        $patientController = new patientController;
        $patient = $patientController->getPatientbyId($meds['patient_id']);


        $patientName = $patient['patient_lName'] .', '. $patient['patient_fName'] .' '. $patient['patient_mName'];
        $action ='deleted a medicine-'. $medicineName . 'for patient-'.  $patientName;


        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }


        Patient_medicine::destroy($id);
        return response('deleted');
    }
}
 