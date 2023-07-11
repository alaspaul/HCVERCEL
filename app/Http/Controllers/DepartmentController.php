<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dep = department::all();

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
        department::insert([
            'department_id' => $request['department_id'],
            'department_name' => $request['department_name'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return view('practiceDep');
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
        $department = department::where('department_id', $id)->get();
        return view('editDep')->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
        
        department::where('department_id', $id)->update(['department_name' => $request['department_name']]);

        return redirect(route('departments.index'))->with('message','dep has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       department::destroy($id);

       return redirect(route('departments.index'))->with('message','dep has been deleted');
    }


    public function updateDep(Request $request, $id)
    {
       
        
        department::where('department_id', $id)->update(['department_name' => $request['department_name']]);

        return redirect(route('departments.index'))->with('message','dep has been updated');
    }


}
