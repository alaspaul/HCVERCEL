<?php

namespace App\Http\Controllers;

use App\Models\phr_attributeValues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PhrAttributeValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = phr_attributeValues::all();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        phr_attributeValues::insert([
           
            'attributeVal_id' => $request['patient_id'] . '-' . $request['categoryAtt_id'],
            'attributeVal_values' => $request['attributeVal_values'],
            'patient_id' => $request['patient_id'],
            'categoryAtt_id' => $request['categoryAtt_id'],

            
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $action ='added a new categoryAttribute';
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);
        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(phr_attributeValues $phr_attributeValues)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, phr_attributeValues $phr_attributeValues)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $action ='deleted an attribute value-'. $id;
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);

        phr_attributeValues::destroy($id);

       
        return response('deleted');
    }
}
