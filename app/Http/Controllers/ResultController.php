<?php

namespace App\Http\Controllers;

use App\Models\result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dep = result::all();

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
        result::insert([
            'result_id' => $request['result_id'],
            'results' => $request['results'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return view('practiceDep');
    }

    /**
     * Display the specified resource.
     */
    public function show(result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $result = result::where('result_id', $id)->get();
        return view('editDep')->with('result', $result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
        
        result::where('result_id', $id)->update(['results' => $request['results'],          'updated_at' => now(),]);

        return redirect(route('results.index'))->with('message','dep has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       result::destroy($id);

       return redirect(route('results.index'))->with('message','dep has been deleted');
    }


    public function updateDep(Request $request, $id)
    {
       
        
        result::where('result_id', $id)->update(['result_name' => $request['result_name']]);

        return redirect(route('results.index'))->with('message','dep has been updated');
    }

}
