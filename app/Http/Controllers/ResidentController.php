<?php

namespace App\Http\Controllers;

use App\Models\resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
           


        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dep = resident::all();

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
        resident::insert([
            'resident_id' => $request['resident_id'],
            'resident_userName' => $request['resident_userName'],
            'resident_fName' => $request['resident_fName'],
            'resident_lName' => $request['resident_lName'],
            'resident_mName' => $request['resident_mName'],
            'resident_password' => $request['resident_password'],
            'department_id' => $request['department_id'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect(route('residents.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(resident $resident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $resident = resident::where('resident_id', $id)->get();
        return view('editDep')->with('resident', $resident);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
        
        resident::where('resident_id', $id)->update(
            [
                'resident_userName' => $request['resident_userName'],
                'resident_fName' => $request['resident_fName'],
                'resident_lName' => $request['resident_lName'],
                'resident_mName' => $request['resident_mName'],
                'resident_password' => $request['resident_password'],
                'department_id' => $request['department_id'],
    
         
                'updated_at' => now(),
                ]
        );

        return redirect(route('residents.index'))->with('message','dep has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       resident::destroy($id);

       return redirect(route('residents.index'))->with('message','dep has been deleted');
    }


    public function updateResident(Request $request, $id)
    {
       
        
        resident::where('resident_id', $id)->update(
            [
                'resident_userName' => $request['resident_userName'],
                'resident_fName' => $request['resident_fName'],
                'resident_lName' => $request['resident_lName'],
                'resident_mName' => $request['resident_mName'],
                'resident_password' => $request['resident_password'],
                'department_id' => $request['department_id'],
    
         
                'updated_at' => now(),
                ]
        );


        return redirect(route('residents.index'))->with('message','dep has been updated');
    }


}
