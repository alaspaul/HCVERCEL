<?php

namespace App\Http\Controllers;

use App\Models\floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = floor::all();
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


        floor::insert([
            'floor_id' => $request['floor_id'],
            'floor_name' => $request['floor_name'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(floor $floor)
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
       floor::destroy($id);

       
       return response('deleted');
    }


    public function updateFloor(Request $request, $id)
    {
       
        
        floor::where('floor_id', $id)->update(
            [
                'floor_id' => $request['floor_id'],
                'floor_name' => $request['floor_name'],

                'updated_at' => now(),
            ]);

        return response('updated');
    }
    
}
