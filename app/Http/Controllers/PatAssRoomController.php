<?php

namespace App\Http\Controllers;

use App\Models\patAssRoom;
use App\Models\patient;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class PatAssRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = patAssRoom::where('isDeleted', false)->Get();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public static function store($patient_id, $room_id)
    {
        $par = new patAssRoom([
            'par_id' => 'PAR-' . $patient_id . $room_id,
            'patient_id' => $patient_id,
            'room_id' => $room_id,
            'isDeleted' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        $action ='added a new par';
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
    
        return response()->json($patient_id . ' stored in ' . $room_id);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(patAssRoom $patAssRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, patAssRoom $patAssRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $action = 'deleted a par-' . $id;
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);

        return response('deleted');
    }

    public function transferPatient($patient_id, request $request)
    {
        if(!$this->patientAssignedRoomExists($patient_id)){
            return response()->json('patient Does not Exists');
        }

        $dataToUpdate = [
            'room_id' =>  $request['room_id'],
            'updated_at' => now()
        ];

        $action = 'transfered a patient -' . $patient_id;
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);

        patAssRoom::where('patient_id', $patient_id)->where('isDeleted', false)->update($dataToUpdate);

        return response()->json('patient Transfered');
    }


    public function getPatientbyRoom($room_id)
    {
        // Get the patient_id from the patAssRooms table
        $patAssRoom = patAssRoom::where('room_id', $room_id)->where('isDeleted', false)->first();

        if ($patAssRoom) {
            // If a record is found in patAssRooms, get the patient_id
            $patient_id = $patAssRoom->patient_id;

            // Use the patient_id to fetch patient data from the patient_healthRecord table
            $patient = patient::where('patient_id', $patient_id)->get();

            return response()->json($patient);
        } else {
            // Handle the case where no patient is found for the room
            return response()->json(['message' => 'No patients found for this room.']);
        }
    }

    public function checkout($patient_id)
    {

        $action = 'checked out a patient -' . $patient_id;
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);

        $dataToUpdate = [
            'isDeleted' => true,
            'updated_at' => now()
        ];
        
        patAssRoom::where('patient_id', $patient_id)->where('isDeleted', false)->update($dataToUpdate);
        return response('checked out');
    }

    public function getRoombyPatient($patient_id)
    {
        $patAssRoom = patAssRoom::where('patient_id', $patient_id)->where('isDeleted', false)->first();
        if($patAssRoom){
        $room = room::where('room_id', $patAssRoom->room_id)->first();

        return $room;
        }

        return 'Patient has no room';
    }

    public function unassignedRooms(){
        $assignedRooms = patAssRoom::select('room_id')->where('isDeleted', false)->get();
        $rooms = room::select('room_id')->whereNotIn('room_id', $assignedRooms)->orderByRaw('LENGTH(room_id) ASC')->orderBy('room_id')->get();

        return response()->json($rooms);
    }

    private function patientAssignedRoomExists($patientId){
        $par = patAssRoom::where('patient_id', $patientId)->where('isDeleted', false)->get();

        if ($par == null){
            return false;
        }else{
            return true;
        }
    }
}
