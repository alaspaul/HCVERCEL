<?php

namespace App\Http\Controllers;

use App\Models\patient_medicine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\medicine;
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
        $data = patient_medicine::all();
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

        $latestorder = patient_medicine::where('patient_id', $request['patient_id'])->where('medicine_id', $request['medicine_id'])->count();
       
        $currentId =  $request['patient_id'] . $request['medicine_id'] .'-'. $latestorder;


        if( !empty( patient_medicine::select('patientMedicine_id')->where('patientMedicine_id', $currentId)->first()->patientMedicine_id )){
        do{
            $latestorder++;
            $depId = $request['patient_id'] . $request['medicine_id'] .'-'. $latestorder;
            $id = patient_medicine::select('patientMedicine_id')->where('patientMedicine_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId =  $request['patient_id'] . $request['medicine_id'] .'-'. $latestorder;
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
    
    



        $action ='added a new medicine-'. $request['medicine_id'] .' for patient-'. $request['patient_id'];
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
    public function show(patient_medicine $patient_medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(patient_medicine $patient_medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        patient_medicine::where('patientMedicine_id', $id)->update(
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
        $meds = patient_medicine::where('patientMedicine_id', $id)->first();

        $medicineController = new MedicineController;
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


        patient_medicine::destroy($id);
        return response('deleted');
    }

    public function getPatientMedicinesByPatientId($patientId)
    {
        try {
            $patientMedicines = patient_medicine::where('patient_id', $patientId)->get();
    
            // Fetch medicine details for each patient medicine
            foreach ($patientMedicines as $medication) {
                $medicine = medicine::find($medication->medicine_id); // Assuming the model for the medicine table is Medicine
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
    
            return response()->json($patientMedicines);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching patient medicines.'], 500);
        }
    }
    

    
}
 