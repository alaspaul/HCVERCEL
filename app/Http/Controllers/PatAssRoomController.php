<?php

namespace App\Http\Controllers;

use App\AppConstants;
use App\Models\patAssRoom;
use App\Models\patient;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Validator;

class PatAssRoomController extends Controller
{
    /**
     * Retrieve all patient assigned rooms.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = patAssRoom::where('isDeleted', false)->Get();

        return response()->json($data);
    }

    /**
     * Store a patient assigned room.
     *
     * @param int $patient_id
     * @param int $room_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($patient_id, $room_id)
    {
        $patient = patient::where('patient_id', $patient_id)->where('isDeleted', false)->first();

        if ($patient == null) {
            return response()->json('patient Does not Exists');
        }

        $room = room::where('room_id', $room_id)->where('isDeleted', false)->first();

        if ($room == null) {
            return response()->json('room Does not Exists');
        }

        if ($this->patientAssignedRoomExists($patient_id)){
            return response()->json('patient already has a room');
        }

        if ($this->roomAlreadyUsed($room_id)){
            return response()->json('room already has a patient');
        }

        patAssRoom::insert([
            'par_id' => 'PAR-' . $patient_id . $room_id,
            'patient_id' => $patient_id,
            'room_id' => $room_id,
            'isDeleted' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $action = new AppConstants;
        $this->LogAction($action->add, $patient_id, $room_id);

        return response()->json($patient_id . ' stored in ' . $room_id);
    }
    
    /**
     * Destroy a patAssRoom record.
     *
     * @param int $id The ID of the patAssRoom record to be destroyed.
     * @return response The JSON response indicating the result of the operation.
     */
    public function destroy($id)
    {   
        $patAssRoom = patAssRoom::where('par_id', $id)->where('isDeleted', false)->first();

        if ($patAssRoom == null) {
            return response('Record Does not Exists');
        }

        $action = new AppConstants;
        $this->LogAction($action->delete, $patAssRoom['patient_id'], $patAssRoom['room_id']);

        return response('deleted');
    }

    /**
     * Transfer a patient to a different room.
     *
     * @param int $patient_id The ID of the patient to be transferred.
     * @param \Illuminate\Http\Request $request The request object containing the new room ID.
     * @return \Illuminate\Http\JsonResponse The JSON response indicating the result of the operation.
     */
    public function transferPatient($patient_id, request $request)
    {
        $patAssRoom = patAssRoom::where('patient_id', $patient_id)->where('isDeleted', false)->first();

        if ($patAssRoom == null) {
            return response()->json('patient Does not Exists');
        }

        if (!$this->patientAssignedRoomExists($patient_id)) {
            return response()->json('patient is not in a Room');
        }

        if ($this->roomAlreadyUsed($request['room_id'])) {
            return response()->json('room already has a patient');
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

    /**
     * Get the patient data for a specific room.
     *
     * @param int $room_id The ID of the room.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the patient data.
     */
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

    /**
     * Checkout a patient.
     *
     * @param int $patient_id The ID of the patient.
     * @return \Illuminate\Http\Response The response indicating successful checkout.
     */
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

    /**
     * Get the room assigned to a specific patient.
     *
     * @param int $patient_id The ID of the patient.
     * @return mixed The room assigned to the patient or "Patient has no room" if not assigned.
     */
    public function getRoombyPatient($patient_id)
    {
        $patAssRoom = patAssRoom::where('patient_id', $patient_id)->where('isDeleted', false)->first();
        if($patAssRoom){
            $room = room::where('room_id', $patAssRoom->room_id)->first();

            return $room;
        }

        return 'Patient has no room';
    }

    /**
     * Get the unassigned rooms.
     *
     * @return \Illuminate\Http\JsonResponse The list of unassigned rooms.
     */
    public function unassignedRooms(){
        $assignedRooms = patAssRoom::select('room_id')->where('isDeleted', false)->get();
        $rooms = room::select('room_id')->whereNotIn('room_id', $assignedRooms)->orderByRaw('LENGTH(room_id) ASC')->orderBy('room_id')->get();

        return response()->json($rooms);
    }

    /**
     * Retrieve the available rooms.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAvailableRooms()
    {
        $patAssRoom = new patAssRoom;
        $occupiedRooms = $patAssRoom->where('room_id', '!=', null)->pluck('room_id');
        $rooms = room::whereNotIn('room_id',  $occupiedRooms)->orderByRaw('LENGTH(room_id) ASC')->orderBy('room_id')->get();
        return response()->json($rooms);
    }


    /**
     * Check if a patient is already assigned to a room.
     *
     * @param int $patientId The ID of the patient.
     * @return bool Returns true if the patient is already assigned to a room, false otherwise.
     */
    private function patientAssignedRoomExists($patientId){
        $par = patAssRoom::where('patient_id', $patientId)->where('isDeleted', false)->first();

        if ($par == null){
            return false;
        }else{
            return true;
        }
    }

    /**
     * Check if a room is already being used.
     *
     * @param int $roomId The ID of the room.
     * @return bool Returns true if the room is already being used, false otherwise.
     */
    private function roomAlreadyUsed($roomId){
        $par = patAssRoom::where('room_id', $roomId)->where('isDeleted', false)->first();

        if ($par == null){
            return false;
        }else{
            return true;
        }
    }

    /**
     * Log an action performed on a patient and room.
     *
     * @param string $action The action performed.
     * @param int $patientid The ID of the patient.
     * @param int $roomid The ID of the room.
     * @return void
     */
    private function LogAction($action, $patientid, $roomid){
        $newAction = $action .' pattient ' . $patientid . ' to room ' . $roomid;

        $user = Auth::user();
        if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $newAction);
        }
    }
}
