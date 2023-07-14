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
        $data = result::all();

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
        result::insert([
            'result_id' => $request['result_id'],
            'results' => $request['results'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response('store');
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
       result::destroy($id);

       return response('deleted');
    }


    public function updateResult(Request $request, $id)
    {
        result::where('result_id', $id)->update(['results' => $request['results'],          'updated_at' => now(),]);

        return response('updated');
    }

}
