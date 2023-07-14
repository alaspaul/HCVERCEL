<?php

namespace App\Http\Controllers;

use App\Models\info_medecine;
use Illuminate\Http\Request;

class InfoMedecineController extends Controller
{
         /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = info_medecine::all();
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
        info_medecine::insert([
            'infoMedecine_id' => $request['infoMedecine_id'],
            'medecineFrequency' => $request['medecineFrequency'],
            'pInfo_id' => $request['pInfo_id'],
            'medecine_id' => $request['medecine_id'],
            

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(info_medecine $info_medecine)
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
       info_medecine::destroy($id);

       
       return response('deleted');
    }


    public function updateDep(Request $request, $id)
    {
       
        
        info_medecine::where('infoMedecine_id', $id)->update(
            [
                'infoMedecine_id' => $request['infomMedecine_id'],
                'medecineFrequency' => $request['medecineFrequency'],
                'pInfo_id' => $request['pInfo_id'],
                'medecine_id' => $request['medecine_id'],
                

                'updated_at' => now(),
            ]);

        return response('updated');
    }
}
