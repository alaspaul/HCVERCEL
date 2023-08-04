<?php

namespace App\Http\Controllers;

use App\Models\medicine;
use Illuminate\Http\Request;

class medicineController extends Controller
{
    


        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = medicine::all();

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
        $last_id = medicine::select('patient_id')->orderBy('created_at', 'desc')->first()->patient_id;
        $latestorder = medicine::all()->count();
        $latestorder++;

        $newId = 'M'. $latestorder;
        if($last_id == $newId){

            $currentId = 'M'. $latestorder;
            while($last_id == $currentId){
                $latestorder++;
            }
            $currentId = 'M'. $latestorder;
        }
        $newId = 'M'. $latestorder;

        
        medicine::insert([
            'medicine_id' =>  $newId,
            'medicine_name' => $request['medicine_name'],
            'medicine_brand' => $request['medicine_brand'],
            'medicine_dosage' => $request['medicine_dosage'],
            'medicine_type' => $request['medicine_type'],
            'medicine_price' => $request['medicine_price'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(medicine $medicine)
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
       medicine::destroy($id);

       
       return response('deleted');
    }


    public function updateMeds(Request $request, $id)
    {
       
        
        medicine::where('medicine_id', $id)->update(
            [        
                'medicine_id' => $request[' medicine_id'],
                'medicine_name' => $request['medicine_name'],
                'medicine_brand' => $request['medicine_brand'],
                'medicine_dosage' => $request['medicine_dosage'],
                'medicine_type' => $request['medicine_type'],
                'medicine_price' => $request['medicine_price'],
    

            'updated_at' => now(),
            ]);
            
        
            return response('updated');
    }

}
