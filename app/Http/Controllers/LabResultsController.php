<?php

namespace App\Http\Controllers;

use App\Models\lab_results;
use Illuminate\Http\Request;

class LabResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = lab_results::all();
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
        lab_results::insert([
            'labResults_id' => $request['labResults_id'],
            'labResultDate' => $request['labResultDate'],
            'results' => $request['results'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(lab_results $lab_results)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lab_results $lab_results)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        lab_results::where('labResults_id', $id)->update(
            [
                'labResults_id' => $request['labResults_id'],
                'labResultDate' => $request['labResultDate'],
                'results' => $request['results'],

                'updated_at' => now(),
            ]);

        return response('updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        lab_results::destroy($id);

       
        return response('deleted');
    }
}
