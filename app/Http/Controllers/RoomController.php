<?php

namespace App\Http\Controllers;

use App\Models\room;
use Illuminate\Http\Request;

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
        $floorId = $request['floor_id'];
       
        if($floorId  == 'F1'){
            $floorName = 'RAA';
         }elseif($floorId  == 'F2'){
            $floorName = 'RAB';
         }elseif($floorId  == 'F3'){
            $floorName = 'RAC1';
         }elseif($floorId  == 'F4'){
            $floorName = 'RAC2';
         }elseif($floorId  == 'F5'){
            $floorName = 'RAC3';
         }elseif($floorId  == 'F6'){
            $floorName = 'RAD1';
         }elseif($floorId  == 'F7'){
            $floorName = 'RAE';
         }

        $latestorder = room::where('floor_id', $floorId )->count();
        $last_id = room::select('room_id')->orderBy('created_at', 'desc')->first()->room_id;
        $currentId = $floorName . $latestorder;
        
        if( !empty(room::select('room_id')->where('room_id', $currentId)->first()->room_id)){
        do{
            $latestorder++;
            $depId = $floorName  . $latestorder;
            $id = room::select('room_id')->where('room_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId = $floorName  . $latestorder;





        room::insert([
            'room_id' => $newId,
            'room_name' => $request['room_name'],
            'room_floor' => $request['room_floor'],
            'room_type' => $request['room_type'],
            'room_price' => $request['room_price'],
            'floor_id' => $request['floor_id'],
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);

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
       room::destroy($id);

       return response('deleted');
    }


    public function updateRoom(Request $request, $id)
    {
       
        
        room::where('room_id', $id)->update(
            [
                'room_name' => $request['room_name'],
                'room_floor' => $request['room_floor'],
                'room_type' => $request['room_type'],
                'room_price' => $request['room_price'],
                'floor_id' => $request['floor_id'],
                

                'updated_at' => now(),
                ]

        );

        return response('updated');
    }


    public function getRoom($room_id){
        $room = room::where('room_id', $room_id)->first();
        return response()->json($room);
    }


    public function getRoomByFloor($floorId){
        $rooms = room::where('floor_Id', $floorId)->orderByRaw('LENGTH(room_id) ASC')->orderBy('room_id')->get();

        return response()->json($rooms);
    }


}
