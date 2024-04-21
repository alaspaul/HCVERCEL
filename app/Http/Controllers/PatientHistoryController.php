<?php

namespace App\Http\Controllers;

use App\Models\patientHistory;
use Illuminate\Http\Request;

class PatientHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($changes, $history_id, $sequenceNum, $AV_id1, $AV_id2, $patient_id)
    {

        $latestOrder = patientHistory::where('history_id', $history_id)->where('patient_id', $patient_id)->count();
        $currentId = $patient_id. $history_id  . '|'.'PH' . '-' . $latestOrder;


        if( !empty(patientHistory::select('ph_id')->where('ph_id', $currentId)->first()->ph_id)){
            do{
                $latestOrder++;
                $histId = $patient_id. $history_id  . '|'.'PH' . '-' . $latestOrder;
                $id = patientHistory::select('ph_id')->where('ph_id', $histId)->first();
             
            }while(!empty($id));
        }

        $newId = $patient_id. $history_id  . '|'.'PH' . '-' . $latestOrder;

        patientHistory::insert([
            'ph_id' => $newId, 
            'ph_changes' => $changes,
            'attributeVal_id1' => $AV_id1,
            'attributeVal_id2' => $AV_id2,
            'history_id' => $history_id,
            'patient_id' => $patient_id,
            'sequence' => $sequenceNum,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }


    /**
     * Retrieve patient history by patient ID.
     */
    public function getPatientHistorybyPatientID($patient_id)
    {
        // Fetch patient history records by patient ID
        $patientHistory = patientHistory::where('patient_id', $patient_id)->orderBy('sequence')->get();

        // Check if any records were found
        if ($patientHistory->isEmpty()) {
            return response()->json(['message' => 'No patient history found for the given patient ID'], 404);
        }

        return response()->json($patientHistory);
    }
}
