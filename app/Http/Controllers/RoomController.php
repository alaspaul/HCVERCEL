<?php

namespace App\Http\Controllers;

use App\AppConstants;
use App\Models\floor;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Retrieve all rooms that are not deleted, ordered by room_id length and room_id.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $data = room::where('isDeleted', false)->orderByRaw('LENGTH(room_id) ASC')->orderBy('room_id')->get();
        return $data;
    }

    /**
     * Store a new room based on the provided request data.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        if ($this->ValidateRoom($request) == false){
            return response('invalid input');
        }

        $floor = floor::where('floor_id', $request['floor_id'])->where('isDeleted', false)->first();

        if ($floor == null) {
            return response()->json('floor Does not Exists');
        }

        $floorName = $floor->floor_name;

        $newId = $this->createNewId($request);

        room::insert([
            'room_id' => $newId,
            'room_name' => $request['room_name'],
            'room_floor' => $floorName,
            'room_type' => $request['room_type'],
            'room_price' => $request['room_price'],
            'floor_id' => $request['floor_id'],
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $action = new AppConstants;
        $this->LogAction($action->add, $newId);

        return response('stored');
    }

    /**
     * Update a room.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($this->ValidateRoom($request) == false){
            return response('invalid input');
        }

        $floor = floor::where('floor_id', $request['floor_id'])->where('isDeleted', false)->first();

        if ($floor == null) {
            return response()->json('floor Does not Exists');
        }

        $room = room::where('room_id', $id)->where('isDeleted', false)->first();

        if ($room == null) {
            return response()->json('room Does not Exists');
        }

        room::where('room_id', $id)->update(
            [
                'room_name' => $request['room_name'],
                'room_floor' => $floor->floor_name,
                'room_type' => $request['room_type'],
                'room_price' => $request['room_price'],
                'floor_id' => $request['floor_id'],
                'updated_at' => now(),
            ]);

        $action = new AppConstants;
        $this->LogAction($action->update, $id);

        return response('updated');
    }

    /**
     * Delete a room.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $room = room::where('room_id', $id)->where('isDeleted', false)->first();
        if($room == null){
            return response('room does not exist');
        }

        $action = new AppConstants;
        $this->LogAction($action->delete, $id);

        room::destroy($id);

        return response('deleted');
    }

    /**
     * Get a room by its ID.
     *
     * @param int $room_id The ID of the room.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the room data.
     */
    public function getRoom($room_id){
        $room = room::where('room_id', $room_id)->where('isDeleted', false)->first();

        if ($room == null) {
            return response()->json('room Does not Exists');
        }

        return response()->json($room);
    }


    /**
     * Get all rooms on a specific floor.
     *
     * @param int $floorId The ID of the floor.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the floor rooms data.
     */
    public function getRoomByFloor($floorId){
        $floorRooms = room::where('floor_Id', $floorId)->where('isDeleted', false)->orderByRaw('LENGTH(room_id) ASC')->orderBy('room_id')->get();

        return response()->json($floorRooms);
    }

    /**
     * Get the room name by its ID.
     *
     * @param int $room_id The ID of the room.
     * @return string|Illuminate\Http\JsonResponse The room name or a JSON response if the room does not exist.
     */
    public function getRoomNamebyId($room_id){
        $roomName = room::select('room_name')->where('room_id', $room_id)->where('isDeleted', false)->first()->room_name;

        if ($roomName == null) {
            return response()->json('room Does not Exists');
        }

        return $roomName;
    }

    /**
     * Get the abbreviation of a floor name.
     *
     * @param string $floorname The name of the floor.
     * @return string The abbreviation of the floor name.
     */
    public function getAbbreviation($floorname) {
        $words = explode(' ', $floorname);
        $abbreviation = '';
        foreach ($words as $word) {
            $abbreviation .= strtoupper($word[0]);
        }
        return 'R' . $abbreviation;
    }

    /**
     * Delete a room by its ID.
     *
     * @param int $id The ID of the room to be deleted.
     * @return \Illuminate\Http\Response The response indicating the result of the deletion.
     */
    public function deleteRoom($id){
        $room = room::where('room_id', $id)->where('isDeleted', false)->first();
        if($room == null){
            return response('room does not exist');
        }

        $action = new AppConstants;
        $this->LogAction($action->delete, $id);

        room::where('room_id', $id)->update(['isDeleted' => true, 'updated_at' => now()]);

        return response('deleted');
    }

    /**
     * Validates the room data from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool  Returns true if the room data is valid, false otherwise.
     */
    private function ValidateRoom(Request $request){
        $validator = Validator::make($request->all(), [
            'room_name' => 'required|string|max:255',
            'room_type' => 'required|string|max:255',
            'room_price' => 'required|numeric',
            'floor_id' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }

    /**
     * Logs the action performed on a room.
     *
     * @param  string  $action  The action performed on the room.
     * @param  int  $id  The ID of the room.
     * @return void
     */
    private function LogAction($action, $id){
        $newAction = $action. ' room ' . $id;
        $user = Auth::user();
        if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $action);
        }
    }

    /**
     * Generates a new unique room ID based on the given floor ID.
     *
     * @param Request $request The HTTP request object.
     * @return string The newly generated room ID.
     */

    private function createNewId(Request $request){
        $floor = floor::where('floor_id', $request['floor_id'])->where('isDeleted', false)->first();

        $floorName = $floor->floor_name;
        $abbreviations = $this->getAbbreviation($floorName);
        $floorId = $floor->floor_id;
       

        $latestorder = room::where('floor_id', $floorId )->count();
        $last_id = room::select('room_id')->orderBy('created_at', 'desc')->first()->room_id;
        $currentId = $abbreviations . $latestorder;
        
        if( !empty(room::select('room_id')->where('room_id', $currentId)->first()->room_id)){
        do{
            $latestorder++;
            $depId = $abbreviations  . $latestorder;
            $id = room::select('room_id')->where('room_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId = $abbreviations  . $latestorder;

        return $newId;
    }
}
