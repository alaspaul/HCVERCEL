<?php

namespace App\Http\Controllers;

use App\Models\PhysicalExam_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PhysicalExamCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = physicalExam_categories::all();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
        $latestorder = physicalExam_categories::all()->count();
        $currentId =  'PE' . $latestorder;

        if( !empty(physicalExam_categories::select('physicalExam_id')->where('physicalExam_id', $currentId)->first()->physicalExam_id)){
        do{
            $latestorder++;
            $physicalExam_id = 'PE' . $latestorder;
            $id = physicalExam_categories::select('physicalExam_id')->where('physicalExam_id', $physicalExam_id)->first();
         
        }while(!empty($id));
        }
         $newId = 'PE' . $latestorder;

         physicalExam_categories::insert([
           
            'physicalExam_id' => $newId,
            'PE_name' => $request['PE_name'],
            'PE_description' => $request['PE_description'],


            'created_at' => now(),
            'updated_at' => now(),
        ]);
        

        $action ='added a new physicalExam Category';
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(physicalExam_categories $physicalExam_categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, physicalExam_categories $physicalExam_categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $PE = physicalExam_categories::where('physicalExam_id', $id)->first();
        $action ='deleted a Physical Exam Category-'. $PE['PE_name'];
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);

        physicalExam_categories::destroy($id);

       
        return response('deleted');
    }
}
