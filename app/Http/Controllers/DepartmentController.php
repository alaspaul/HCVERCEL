<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;
use App\Models\resident;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = department::all();
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
        $last_id = department::select('patient_id')->orderBy('created_at', 'desc')->first()->patient_id;
        $latestorder = department::all()->count();
        $latestorder++;

        $newId = 'D'. $latestorder;
        if($last_id == $newId){

            $currentId = 'D'. $latestorder;
            while($last_id == $currentId){
                $latestorder++;
            }
            $currentId = 'D'. $latestorder;
        }
        $newId = 'D'. $latestorder;

        department::insert([
            'department_id' => 'D'. $latestorder,
            'department_name' => $request['department_name'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

 
        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(department $department)
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
       department::destroy($id);

       
       return response('deleted');
    }


    public function updateDep(Request $request, $id)
    {
       
        
        department::where('department_id', $id)->update(['department_name' => $request['department_name']]);

        return response('done');
    }


}
