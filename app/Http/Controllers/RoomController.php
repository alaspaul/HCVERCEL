<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RoomController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Room::orderByRaw('LENGTH(room_id) ASC')->orderBy('room_id')->get();
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
        $floorName = Floor::where('floor_id', $request['floor_id'])->first()->floor_name;
        $abbreviations = $this->getAbbreviation($floorName);
       


        $floorId = $request['floor_id'];
       

        $latestorder = Room::where('floor_id', $floorId )->count();
        $last_id = Room::select('room_id')->orderBy('created_at', 'desc')->first()->room_id;
        $currentId = $abbreviations . $latestorder;
        
        if( !empty(Room::select('room_id')->where('room_id', $currentId)->first()->room_id)){
        do{
            $latestorder++;
            $depId = $abbreviations  . $latestorder;
            $id = Room::select('room_id')->where('room_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId = $abbreviations  . $latestorder;





        Room::insert([
            'room_id' => $newId,
            'room_name' => $request['room_name'],
            'room_floor' => $floorName,
            'room_type' => $request['room_type'],
            'room_price' => $request['room_price'],
            'floor_id' => $request['floor_id'],
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $action ='added a new Room-'. $request['room_name'];
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
    public function show(Room $room)
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
        $name = Room::select('room_name')->where('room_id', $id)->first()->room_name;
        $action ='deleted a Floor-'. $name;
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
       Room::destroy($id);

       return response('deleted');
    }


    public function updateRoom(Request $request, $id)
    {
       
        
        Room::where('room_id', $id)->update(
            [
                'room_name' => $request['room_name'],
                'room_floor' => $request['room_floor'],
                'room_type' => $request['room_type'],
                'room_price' => $request['room_price'],
                'floor_id' => $request['floor_id'],
                

                'updated_at' => now(),
                ]

        );
        $action ='updated a Room where id-'. $id;
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
        return response('updated');
    }


    public function getRoom($room_id){
        $room = Room::where('room_id', $room_id)->first();
        return response()->json($room);
    }


    public function getRoomByFloor($floorId){
        $rooms = Room::where('floor_Id', $floorId)->orderByRaw('LENGTH(room_id) ASC')->orderBy('room_id')->get();

        return response()->json($rooms);
    }


    public function getRoomNamebyId($room_id){
        $roomName = Room::select('room_name')->where('room_id', $room_id)->first()->room_name;

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
