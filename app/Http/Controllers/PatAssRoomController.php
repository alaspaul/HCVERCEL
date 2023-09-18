<?php

namespace App\Http\Controllers;

use App\Models\patAssRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function store(Request $request)
    {
        patAssRoom::insert([
           
            'par_id' =>  'PAR-'. $request['patient_id'] . $request['room_id'],
            'patient_id' => $request['patient_id'],
            'room_id' => $request['room_id'],
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $action ='added a new par';
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);
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
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);

        patAssRoom::destroy($id);

       
        return response('deleted');
    }
}
