<?php

namespace App\Http\Controllers;

use App\Models\observation;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = observation::all();
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
        observation::insert([
            'observation_id' => $request['observation_id'],
            'observationDate' => $request['observationDate'],
            'observation' => $request['observation'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(observation $observation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(observation $observation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        observation::where('observation_id', $id)->update(
            [
                'observation_id' => $request['observation_id'],
                'observationDate' => $request['observationDate'],
                'observation' => $request['observation'],

                'updated_at' => now(),
            ]);

        return response('updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        observation::destroy($id);

       
        return response('deleted');
    }
}
