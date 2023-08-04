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
        $data = room::all();

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
        $floorId = '';
       
        $last_id = room::select('patient_id')->orderBy('created_at', 'desc')->first()->patient_id;
        $latestorder = room::all()->count();
        $latestorder++;

        $currentId =  $latestorder;
        if($last_id == $currentId){

            $newId =  $latestorder;
            while($last_id == $newId){
                $latestorder++;
            }
            $newId =  $latestorder;
        }
        $currentId =  $latestorder;


         if($request['floor_id'] == 'F01'){
            $floorId = 'RAA';
         }elseif($request['floor_id'] == 'F02'){
            $floorId = 'RAC1';
         }elseif($request['floor_id'] == 'F03'){
            $floorId = 'RAC2';
         }elseif($request['floor_id'] == 'F04'){
            $floorId = 'RAC3';
         }elseif($request['floor_id'] == 'F05'){
            $floorId = 'RAD1';
         }elseif($request['floor_id'] == 'F06'){
            $floorId = 'RAE';
         }else
        room::insert([
            'room_id' => $floorId . $latestorder,
            'room_name' => $request['room_name'],
            'room_building' => $request['room_building'],
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

        $rooms = room::where('floor_Id', $floorId)->get();

        return response()->json($rooms);
    }


}
