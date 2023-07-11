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
        $dep = room::all();

        return view('practiceDep')->with('deps' , $dep);
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
        room::insert([
            'room_id' => $request['room_id'],
            'room_name' => $request['room_name'],
            'room_building' => $request['room_building'],
            'room_type' => $request['room_type'],
            'room_price' => $request['room_price'],
            'floor_id' => $request['floor_id'],
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect(route('room.index'));
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
        $room = room::where('room_id', $id)->get();
        return view('editDep')->with('room', $room);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
        
        room::where('room_id', $id)->update(
            [
                'room_name' => $request['room_name'],
                'room_building' => $request['room_building'],
                'room_type' => $request['room_type'],
                'room_price' => $request['room_price'],
                'floor_id' => $request['floor_id'],
                

                'updated_at' => now(),
                ]

        );

        return redirect(route('room.index'))->with('message','dep has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       room::destroy($id);

       return redirect(route('room.index'))->with('message','dep has been deleted');
    }


    public function updateRoom(Request $request, $id)
    {
       
        
        room::where('room_id', $id)->update(
            [
                'room_name' => $request['room_name'],
                'room_building' => $request['room_building'],
                'room_type' => $request['room_type'],
                'room_price' => $request['room_price'],
                'floor_id' => $request['floor_id'],
                

                'updated_at' => now(),
                ]

        );

        return redirect(route('room.index'))->with('message','dep has been updated');
    }


}
