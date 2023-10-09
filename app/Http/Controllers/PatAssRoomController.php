<?php

namespace App\Http\Controllers;

use App\Models\patAssRoom;
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
        $data = patAssRoom::all();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public static function store($patient_id, $room_id)
    {
        $par = new patAssRoom([
            'par_id' =>  'PAR-'. $patient_id .$room_id,
            'patient_id' =>$patient_id,
            'room_id' => $room_id,
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $par->save();

        $action ='added a new par';
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        return response('stored');
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

        $action ='deleted a par-'. $id;
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        patAssRoom::destroy($id);

       
        return response('deleted');
    }



    public function getAvailableRooms(){

        $occupiedRooms = patAssRoom::where('room_id','!=',null)->pluck('room_id');
        $rooms = DB::table('rooms')->whereNotIn('room_id',  $occupiedRooms)->orderByRaw('LENGTH(room_id) ASC')->orderBy('room_id')->get();
        return response()->json($rooms);
        
    }


    public function transferPatient($patient_id, request $request){
        $dataToUpdate = [
            'room_id' =>  $request['room_id'],
         ];

         $action ='transfered a patient -'. $patient_id;
         $log = new ResActionLogController;
         $log->store(Auth::user(), $action);
 
         patAssRoom::where('patient_id', $patient_id)->update($dataToUpdate);
         return response()->json('patient Transfered');
        
    }


    public function getPatientbyRoom($room_id){

        $patient_id = patAssRoom::where('room_id', $room_id)->first()->patient_id;

        $pat = new PatientController;

        $patient = $pat->getPatientbyId($patient_id);

        return response()->json($patient);
    }


    public function checkout($patient_id)
    {

        $action ='checkedout a patient -'. $patient_id;
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        patAssRoom::where('patient_id', $patient_id)->delete();

       
        return response('checkedout');
    }

    public function getPatient($patient_id)
    {

       $patient = new PatientController;

       $pat = $patient->getPatientbyId($patient_id);

       return $pat;
    }

    

    public function getRoombyPatient($patient_id)
    {
       $par = patAssRoom::where('patient_id', $patient_id)->first();
   
       $roomCon = new RoomController;

       $room = $roomCon->getRoom($par->room_id);

       return $room;
    }

}
