<?php

namespace App\Http\Controllers;

use App\Models\physicalExam_Attributes;
use App\Models\physicalExam_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PhysicalExamAttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = physicalExam_Attributes::all();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $physicalExam_id = physicalExam_categories::where('physicalExam_id', $request['physicalExam_id'])->first()->physicalExam_id;
        $latestorder = physicalExam_Attributes::where('physicalExam_id', $request['physicalExam_id'])->count();
        $currentId =  $physicalExam_id . 'PEA' . $latestorder;

        if( !empty(physicalExam_Attributes::select('PEA_id')->where('PEA_id', $currentId)->first()->PEA_id)){
        do{
            $latestorder++;
            $PEA_id = $physicalExam_id . 'PEA' . $latestorder;
            $id = physicalExam_Attributes::select('PEA_id')->where('PEA_id', $PEA_id)->first();
         
        }while(!empty($id));
        }

         $newId = $physicalExam_id . 'PEA' . $latestorder;

         physicalExam_Attributes::insert([
           
            'PEA_id' => $newId,
            'PEA_name' => $request['PEA_name'],
            'PEA_dataType' => $request['PEA_dataType'],
            'physicalExam_id' => $request['physicalExam_id'],


            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $action ='added a new Physical Exam Attribute';
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);
        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(physicalExam_Attributes $physicalExam_Attributes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, physicalExam_Attributes $physicalExam_Attributes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $PEA = physicalExam_Attributes::where('PEA_id', $id)->first();
        $action ='deleted a Physical Exam Attribute-'. $PEA['PEA_name'];
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);

        physicalExam_Attributes::destroy($id);

       
        return response('deleted');
    }
}
