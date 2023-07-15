<?php

namespace App\Http\Controllers;

use App\Models\info_medicine;
use Illuminate\Http\Request;

class InfomedicineController extends Controller
{
         /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = info_medicine::all();
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
        info_medicine::insert([
            'infomedicine_id' => $request['infomedicine_id'],
            'medicineFrequency' => $request['medicineFrequency'],
            'pInfo_id' => $request['pInfo_id'],
            'medicine_id' => $request['medicine_id'],
            

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(info_medicine $info_medicine)
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
       info_medicine::destroy($id);

       
       return response('deleted');
    }


    public function updateInfomedicine(Request $request, $id)
    {
       

        
        info_medicine::where('infomedicine_id', $id)->update(
            [
                'infomedicine_id' => $request['infommedicine_id'],
                'medicineFrequency' => $request['medicineFrequency'],
                'pInfo_id' => $request['pInfo_id'],
                'medicine_id' => $request['medicine_id'],
                

                'updated_at' => now(),
            ]);

        return response('updated');
    }
}
