<?php

namespace App\Http\Controllers;

use App\Models\info_results;
use Illuminate\Http\Request;

class InfoResultsController extends Controller
{
          /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = info_results::all();
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
        info_results::insert([
            'infoResults_id' => $request['infoResults_id'],
            'result_id' => $request['result_id'],
            'pInfo_id' => $request['pInfo_id'],
            
            

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(info_results $info_results)
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
       info_results::destroy($id);

       
       return response('deleted');
    }


    public function updateInfoResults(Request $request, $id)
    {
       
        
        info_results::where('infoResults_id', $id)->update(
            [
                'infoResults_id' => $request['infoResults_id'],
                'result_id' => $request['result_id'],
                'pInfo_id' => $request['pInfo_id'],
                

                'updated_at' => now(),
            ]);

        return response('updated');
    }
}
