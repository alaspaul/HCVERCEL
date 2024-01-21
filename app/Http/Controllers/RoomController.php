<?php

namespace App\Http\Controllers;

use App\Models\floor;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RoomController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = room::orderByRaw('LENGTH(room_id) ASC')->orderBy('room_id')->get();
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
        $floorName = floor::where('floor_id', $request['floor_id'])->first()->floor_name;
        $abbreviations = $this->getAbbreviation($floorName);
       


        $floorId = $request['floor_id'];
       

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

        $action ='added a new room-'. $request['room_name'];
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
    public function show(room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $name = room::select('room_name')->where('room_id', $id)->first()->room_name;
        $action ='deleted a floor-'. $name;
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
       room::destroy($id);

       return response('deleted');
    }


    public function updateRoom(Request $request, $roomId)
    {
        try {
            $room = Room::findOrFail($roomId);
    
            $room->update([
                'room_name' => $request->input('room_name'),
                'room_floor' => $request->input('room_floor'),
                'room_type' => $request->input('room_type'),
                'room_price' => $request->input('room_price'),
                'floor_id' => $request->input('floor_id'),
                'updated_at' => now(),
            ]);
    
            $action = 'updated a room where id-' . $roomId;
            $user = Auth::user();
            if ($user['role'] != 'admin') {
                $log = new ResActionLogController;
                $log->store(Auth::user(), $action);
            }
    
            return response('updated');
        } catch (\Exception $e) {
            // Handle exception, e.g., return an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    


    public function getRoom($room_id){
        $room = room::where('room_id', $room_id)->first();
        return response()->json($room);
    }


    public function getRoomByFloor($floorId){
        $rooms = new room;
        $floorRooms = $rooms::where('floor_Id', $floorId)->orderByRaw('LENGTH(room_id) ASC')->orderBy('room_id')->get();

        return response()->json($floorRooms);
    }


    public function getRoomNamebyId($room_id){
        $roomName = room::select('room_name')->where('room_id', $room_id)->first()->room_name;

        return $roomName;
    }

    public function getAbbreviation($floorname) {
        $words = explode(' ', $floorname);
        $abbreviation = '';
        foreach ($words as $word) {
            $abbreviation .= strtoupper($word[0]);
        }
        return 'R' . $abbreviation;
    }
}
