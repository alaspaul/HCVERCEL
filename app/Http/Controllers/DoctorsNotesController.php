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
        
        $data = doctors_notes::all();
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
        doctors_notes::insert([
            'docNotes_id' => $request['docNotes_id'],
            'notes' => $request['notes'],
            'pInfo_id' => $request['pInfo_id'],
            'resident_id' => $request['resident_id'],


            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response('stored');
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
       doctors_notes::destroy($id);

       
       return response('deleted');
    }


    public function updateDocNotes(Request $request, $id)
    {
       
        
        doctors_notes::where('docNotes_id', $id)->update(
            [
                'notes' => $request['notes'],
                'pInfo_id' => $request['pInfo_id'],
                'resident_id' => $request['resident_id'],

                'updated_at' => now(),
            ]);

        return response('updated');
    }

}
