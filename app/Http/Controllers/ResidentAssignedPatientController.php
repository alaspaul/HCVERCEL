<?php

namespace App\Http\Controllers;

use App\Models\resident;
use App\Models\residentAssignedPatient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ResidentAssignedPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = residentAssignedPatient::all();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $patient_id, string $resident_id)
    {
        $existingAssignment = residentAssignedPatient::where('resident_id', $resident_id)
            ->where('patient_id', $patient_id)
            ->first();

        if ($existingAssignment) {
            return response()->json(['error' => 'Assignment already exists.'], 400);
        }

        $newId = $this->createNewId($patient_id, $resident_id);
        residentAssignedPatient::insert([
            'RAP_id' => $newId,
            'resident_id' => $resident_id,
            'patient_id' => $patient_id,
            'isMainResident' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }

    public function show(){

    }

    public function update(){

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $residentAssignedPatient = residentAssignedPatient::where('RAP_id', $id)->first();

        if ($residentAssignedPatient == null) {
            return response()->json('Record Does not Exists');
        }
        residentAssignedPatient::destroy($id);
        return response()->json('deleted');
    }

    public function getPatientsAssignedToResident()
    {

        $user = Auth::user();
        if ($user['role'] == 'admin') {
            return response()->json('Unauthorized');
        }

        if($user['role'] == 'resident'){
            $residentRap = residentAssignedPatient::where('resident_id', $user['resident_id'])->get();

            $allRapMain = residentAssignedPatient::whereIn('patient_id', $residentRap->pluck('patient_id'))->where('isMainResident', false)->get();

            return response()->json($allRapMain);
        }else{
            $residents = resident::where('department_id', $user['department_id'])->get();

            $data = residentAssignedPatient::whereIn('resident_id', $residents->pluck('resident_id'))->get();
        }
        return response()->json($data);
    }
    
    public function getPatientsByResident()
    {
        $user = Auth::user();
        if ($user['role'] == 'admin') {
            return response()->json('Unauthorized');
        }

        if($user['role'] == 'resident'){

            $data = residentAssignedPatient::where('resident_id', $user['resident_id'])
            ->distinct('patient_id')
            ->get();

        }else{

            $residents = resident::where('department_id', $user['department_id'])->get();

            $data = residentAssignedPatient::whereIn('resident_id', $residents->pluck('resident_id'))->get();
        }
        return response()->json($data);
    }

    public function getAvailablePatients()
    {
        $data = residentAssignedPatient::select('patient_id')->get();

        return response()->json($data);
    }

    public function sharePatient(string $patient_id, request $request)
    {
        $user = Auth::user();
        $resident_id = $request['resident_id'];
        if ($user['role'] == 'admin') {
            return response()->json('Unauthorized');
        }

        if($user['role'] == 'resident'){
            $hasAccess = residentAssignedPatient::where('patient_id', $patient_id)
            ->where('resident_id', $user['resident_id'])
            ->where('isMainResident', true)
            ->first();

            if(empty($hasAccess)){
                return response()->json('Unauthorized');
            } 
        }

        $existingAssignment = residentAssignedPatient::where('resident_id', $resident_id)
            ->where('patient_id', $patient_id)
            ->first();

        if ($existingAssignment) {
            return response()->json(['error' => 'Assignment already exists.'], 400);
        }

        $newId = $this->createNewId($patient_id, $resident_id);
        residentAssignedPatient::insert([
            'RAP_id' => $newId,
            'resident_id' => $resident_id,
            'patient_id' => $patient_id,
            'isFinished' => 0,
            'isMainResident' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function createNewId($patient_id, $resident_id){
        // Get the latest order count for the patient and Room combination
        $latestorder = residentAssignedPatient::where('patient_id', $patient_id)->where('resident_id', $resident_id)->count();
       
        $currentId =  'RAP-' . $resident_id .'-'. $latestorder;

        // Check if the current ID already exists in the database
        if( !empty( residentAssignedPatient::select('RAP_id')->where('RAP_id', $currentId)->first()->RAP_id )){
            // If it exists, generate a new ID by incrementing the order count
            do{
                $latestorder++;
                $depId = 'RAP-' . $resident_id .'-'. $latestorder;
                $id = residentAssignedPatient::select('RAP_id')->where('RAP_id', $depId)->first();
             
            }while(!empty($id));
        }

        $newId =  'RAP-' . $resident_id .'-'. $latestorder;
        return $newId;
    }
}
