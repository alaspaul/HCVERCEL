<?php

namespace App\Http\Controllers;

use App\Models\phr_attributeValues;
use App\Models\phr_categoryAttributes;
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
    public static function store(Request $request, $patient_id)
    {

        $attributes = phr_categoryAttributes::all();

        foreach($attributes as $attribute){
      
        
            $id = $patient_id . '-' . $attribute['categoryAtt_id'];

            if(!empty($request[$attribute['categoryAtt_name']])){
                $attributeVal = new phr_attributeValues([
                    'attributeVal_id' => $id,
                    'attributeVal_values' => $request[$attribute['categoryAtt_name']],
                    'patient_id' => $patient_id,
                    'categoryAtt_id' => $attribute['categoryAtt_id'],

            
                     'created_at' => now(),
                     'updated_at' => now(),
                ]);
                
                $attributeVal->save();
        }else{
            $variable = 0;
            if($attribute['categoryAtt_dataType'] == 'boolean'){
                $variable = 0;
            }elseif($attribute['categoryAtt_dataType'] == 'date'){
                $variable = 'NAN';
            }elseif($attribute['categoryAtt_dataType'] == 'text'){
                $variable = 'none';
            }elseif($attribute['categoryAtt_dataType'] == 'integer'){
                $variable = 0;
            }


            $attributeVal = new phr_attributeValues([
           
                'attributeVal_id' => $id,
                'attributeVal_values' => $variable,
                'patient_id' => $patient_id,
                'categoryAtt_id' => $attribute['categoryAtt_id'],

        
                 'created_at' => now(),
                 'updated_at' => now(),
             ]);

             $attributeVal->save();
            
        }
    }
        $action ='added a new categoryAttribute';
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
       return response()->json('stored');
    
        
    }

    /**
     * Display the specified resource.
     */
    public function show($patient_id)
    {
        $patient = phr_attributeValues::where('patient_id', $patient_id)->get();


        return response()->json($patient);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($patient_id, Request $request)
    {
        $attributes = phr_categoryAttributes::all();

        foreach($attributes as $attribute){
       
            if(!empty($request[$attribute['categoryAtt_name']])){
     
        
                phr_attributeValues::where('categoryAtt_id', $attribute['categoryAtt_id'])
                                    ->where('patient_id', $patient_id)
                                    ->update([
                    'attributeVal_values' => $request[$attribute['categoryAtt_name']],
                    'updated_at' => now()
                ]);


        }else{}

        }
        return response()->json('phr updated');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        $action ='deleted an attribute value-'. $id;
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        phr_attributeValues::destroy($id);

       
        return response('deleted');
    }

    public function getPHR($patient_id){
        $PAV = phr_attributeValues::where('patient_id', $patient_id)->get();


        return response()->json($PAV);
    }

    public function getAttributeName($categoryAtt_id){
        $attribute = new PhrCategoryAttributesController;

        $attributeName = $attribute->getAttributeName($categoryAtt_id);

        return $attributeName;

    }

}
