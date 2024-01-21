<?php

namespace App\Http\Controllers;

use App\Models\PatientHistory;
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
    public function store($changes, $history_id, $AV_id1, $AV_id2)
    {

        $latestOrder = patientHistory::where('history_id', $history_id)->count();
        $currentId = $history_id . '|'.'PH' . '-' . $latestOrder;

        if( !empty(patientHistory::select('ph_id')->where('ph_id', $currentId)->first()->ph_id)){
            do{
                $latestorder++;
                $histId = $history_id . '|'.'PH' . '-' . $latestOrder;
                $id = patientHistory::select('ph_id')->where('ph_id', $currentId)->first();
             
            }while(!empty($id));
        }

        $newId = $history_id . '|'.'PH' . '-' . $latestOrder;

        patientHistory::insert([
            'ph_id' => $newId, 
            'ph_changes' => $changes,
            'attributeVal_id1' => $AV_id1,
            'attributeVal_id2' => $AV_id2,
            'history_id' => $history_id,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(patientHistory $patientHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, patientHistory $patientHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(patientHistory $patientHistory)
    {
        //
    }
}
