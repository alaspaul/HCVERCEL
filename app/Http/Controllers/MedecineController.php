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
        $dep = medecine::all();

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
        medecine::insert([
            'medecine_id' => $request[' medecine_id'],
            'medecine_name' => $request['medecine_name'],
            'medecine_brand' => $request['medecine_brand'],
            'medecine_dosage' => $request['medecine_dosage'],
            'medecine_price' => $request['medecine_price'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return view('practiceDep');
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
    public function edit($id)
    {   
        $medecine = medecine::where('medecine_id', $id)->get();
        return view('editDep')->with('medecine', $medecine);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
        
        medecine::where('medecine_id', $id)->update(
            [        
            'medecine_name' => $request['medecine_name'],
            'medecine_brand' => $request['medecine_brand'],
            'medecine_dosage' => $request['medecine_dosage'],
            'medecine_price' => $request['medecine_price'],

            'updated_at' => now(),
            ]);

        return redirect(route('medecines.index'))->with('message','dep has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       medecine::destroy($id);

       return redirect(route('medecines.index'))->with('message','dep has been deleted');
    }


    public function updateDep(Request $request, $id)
    {
       
        
        medecine::where('medecine_id', $id)->update(['medecine_name' => $request['medecine_name']]);

        return redirect(route('medecines.index'))->with('message','dep has been updated');
    }

}
