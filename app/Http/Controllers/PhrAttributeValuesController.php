<?php

namespace App\Http\Controllers;

use App\Models\patientHistory;
use App\Models\phr_attributeValues;
use App\Models\phr_categoryAttributes;
use App\Models\phr_formCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $latestSequenceNum = phr_attributeValues::where('patient_id', $patient_id)
        ->distinct('sequence') // Ensure distinct sequences
        ->max('sequence'); // Get the maximum sequence number
        
        if ($latestSequenceNum !== null) {
            // If a record is found, increment the sequence number
            $sequenceNum = $latestSequenceNum + 1;
        } else {
            // If no record is found, set the sequence number to 0
            $sequenceNum = 0;
        }

        foreach ($attributes as $attribute) {
            $exit = 0;
            $latestOrder = 0;

            while ($exit == 0) {
                $thisId = $patient_id . '-' . $attribute['categoryAtt_id'] . '-' . $latestOrder;
                if (!empty(phr_attributeValues::where('attributeVal_id', $thisId)->first()->categoryAtt_id)) {
                    $exit = 0;
                    $latestOrder++;
                } else {
                    $exit = 1;
                }
            }

            $id = $patient_id . '-' . $attribute['categoryAtt_id'] . '-' . $latestOrder;

            if (!empty($request[$attribute['categoryAtt_name']])) {
                phr_attributeValues::insert([
                    'attributeVal_id' => $id,
                    'attributeVal_values' => $request[$attribute['categoryAtt_name']],
                    'patient_id' => $patient_id,
                    'categoryAtt_id' => $attribute['categoryAtt_id'],
                    'sequence' => $sequenceNum,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                $variable = 0;
                if ($attribute['categoryAtt_dataType'] == 'boolean') {
                    $variable = 0;
                } elseif ($attribute['categoryAtt_dataType'] == 'date') {
                    $variable = 'NAN';
                } elseif ($attribute['categoryAtt_dataType'] == 'text') {
                    $variable = 'none';
                } elseif ($attribute['categoryAtt_dataType'] == 'integer') {
                    $variable = 0;
                }

                phr_attributeValues::insert([
                    'attributeVal_id' => $id,
                    'attributeVal_values' => $variable,
                    'patient_id' => $patient_id,
                    'categoryAtt_id' => $attribute['categoryAtt_id'],
                    'sequence' => $sequenceNum,
                    'created_at' => Carbon::today()->toDateString(),
                    'updated_at' => Carbon::today()->toDateString(),
                ]);
            }
        }

    
        $sequences = phr_attributeValues::select('sequence')
        ->where('patient_id', $patient_id)
        ->distinct() // Ensure distinct sequences
        ->orderBy('sequence', 'desc')
        ->limit(2) // Limit to the two latest sequences
        ->pluck('sequence');
    
        if ($sequences->count() >= 2) {
            $PAVC = new PhrAttributeValuesController;
            $PAVC->comparePhr($patient_id, $sequences[1], $sequences[0]);
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

    public function updateField($patient_id, $attributeVal_id, Request $request)
    {
        // Validate request data
        $request->validate([
            'attributeVal_values' => 'required', // Assuming the field to update is 'attributeVal_values'
        ]);
    
        // Update the specified field
        phr_attributeValues::where('attributeVal_id', $attributeVal_id)
            ->where('patient_id', $patient_id)
            ->update([
                'attributeVal_values' => $request->input('attributeVal_values'),
                'updated_at' => now(),
            ]);
    
        // Return a response
        return response()->json('Field updated successfully');
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

    public function getPHR($patient_id)
    {
        $dates = phr_attributeValues::select('created_at')->distinct()->orderBy('created_at', 'desc')->pluck('created_at');
        $date = new Carbon($dates[0]);
        $formattedDate = $date->format('Y-m-d');
    
        $PAV = phr_attributeValues::where('patient_id', $patient_id)->where('created_at', 'LIKE', $formattedDate . '%')->get();
    
        $result = $PAV->map(function ($item) {
            $categoryAtt_id = $item['categoryAtt_id'];
            $attributeName = phr_categoryAttributes::where('categoryAtt_id', $categoryAtt_id)->value('categoryAtt_name');
            $formCat_id = phr_categoryAttributes::where('categoryAtt_id', $categoryAtt_id)->value('formCat_id');
            $formCategoryName = phr_formCategories::where('formCat_id', $formCat_id)->value('formCat_name');
    
            return [
                'created_at' => $item['created_at'],
                'formCat_name' => $formCategoryName,
                'categoryAtt_name' => $attributeName,
                'attributeVal_values' => $item['attributeVal_values'],
            ];
        });
    
        return response()->json($result);
    }

    

    public function getAttributeName($categoryAtt_id)
    {
        $attributeName = phr_categoryAttributes::where('categoryAtt_id', $categoryAtt_id)
            ->value('categoryAtt_name');

        return $attributeName;
    }

    public function getFormCategoryName($formCat_id)
    {
        $formCategoryName = phr_categoryAttributes::where('formCat_id', $formCat_id)
            ->value('formCat_name');

        return $formCategoryName;
    }


    public function getPhrDates($patient_id){

        $dates = phr_attributeValues::select('created_at')->distinct()->where('patient_id', $patient_id)->get();

        
        return $dates->pluck('created_at');
    }

    public function getPhrbyDate($patient_id, request $request){

        $phr = phr_attributeValues::where('created_at', $request['date'])->where('patient_id', $patient_id)->get();
      
        return $phr;
    }

    public function comparePhr($patient_id, $sequence1, $sequence2){
        $phr1 = phr_attributeValues::where('sequence', $sequence1)
            ->where('patient_id', $patient_id)
            ->orderBy('attributeVal_id')
            ->get();
    
        $phr2 = phr_attributeValues::where('sequence', $sequence2)
            ->where('patient_id', $patient_id)
            ->orderBy('attributeVal_id')
            ->get();
    
        $array = [];
    
        $PCA = new phr_categoryAttributes;
    
        $length = $PCA->count(); 
        $history = new HistoryController;
    
        $history_id = $history->store();

        $latestAttVAlSequenceRecord = patientHistory::where('patient_id', $patient_id)
        ->orderBy('sequence', 'desc')
        ->first();
    
        if ($latestAttVAlSequenceRecord) {
            // If a record is found, increment the sequence number
            $sequenceAttValNum = $latestAttVAlSequenceRecord->sequence + 1;
        } else {
            // If no record is found, set the sequence number to 0
            $sequenceAttValNum = 0;
        }
    
        for($i = 0; $i <= $length-1; $i++){
            if(isset($phr1[$i]) && isset($phr2[$i]) && $phr1[$i]['attributeVal_values'] != $phr2[$i]['attributeVal_values']){
                $array[$i] = $this->getAttributeName($phr1[$i]['categoryAtt_id']) . 
                            ' is changed from ' . $phr1[$i]['attributeVal_values'] . ' to ' . 
                            $phr2[$i]['attributeVal_values']. ' on ' . $phr2[$i]['created_at'];
    
                $ph = new PatientHistoryController;
                $ph->store($array[$i], $history_id, $sequenceAttValNum, $phr1[$i]['attributeVal_id'], $phr2[$i]['attributeVal_id'], $patient_id);
            }
        }
    
        return $array; 
    }

    public function getPHRM($patient_id)
    {
        $dates = phr_attributeValues::select('created_at')->distinct()->orderBy('created_at', 'desc')->pluck('created_at');
        $date = new Carbon($dates[0]);
        $formattedDate = $date->format('Y-m-d');
    
        $PAV = phr_attributeValues::where('patient_id', $patient_id)->where('created_at', 'LIKE', $formattedDate . '%')->get();
    
    
        return response()->json($PAV);
    }
    
}