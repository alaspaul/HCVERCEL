<?php

namespace App\Http\Controllers;

use App\Models\doctors_notes;
use Illuminate\Http\Request;

class DoctorsNotesController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(doctors_notes $doctors_notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(doctors_notes $doctors_notes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, doctors_notes $doctors_notes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        doctors_notes::destroy($id);

        return redirect(route('doctors_notes.index'))->with('message','dep has been deleted');
    }
}
