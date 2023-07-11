<?php

namespace App\Http\Controllers;

use App\Models\medecine;
use Illuminate\Http\Request;

class MedecineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        medecine::insert([
            'medecine_id' => $request[' medecine_id'],
            'medecine_name' => $request['medecine_name'],
            'medecine_brand' => $request['medecine_brand'],
            'medecine_dosage' => $request['medecine_dosage'],
            'medecine_price' => $request['medecine_price'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(medecine $medecine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(medecine $medecine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, medecine $medecine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(medecine $medecine)
    {
        //
    }
}
