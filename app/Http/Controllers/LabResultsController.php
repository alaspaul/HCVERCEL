<?php

namespace App\Http\Controllers;

use App\Models\Lab_results;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class LabResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Lab_results::all();
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
        $time = now();
        $date = new Carbon( $time ); 
        $latestorder = Lab_results::where('patient_id', $request['patient_id'])->count();
        $currentId =  $request['patient_id'] . 'L' . $latestorder;


        if( !empty( Lab_results::select('labResults_id')->where('labResults_id', $currentId)->first()->labResults_id )){
        do{
            $latestorder++;
            $depId =  $request['patient_id'] . 'L' . $latestorder;
            $id = Lab_results::select('labResults_id')->where('labResults_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId =  $request['patient_id'] . 'L' . $latestorder;

        Lab_results::insert([
        'labResults_id' => $newId,
        'labResultDate' => $request['labResultDate'],
        'results' => $request['results'],
        'patient_id' => $request['patient_id'],

        'created_at' => now(),
        'updated_at' => now(),
        ]);


        $action ='created a new labResult-'.$newId.' for patient-'. $request['patient_id'];
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lab_results $lab_results)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lab_results $lab_results)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Lab_results::where('labResults_id', $id)->update(
            [
                'labResults_id' => $request['labResults_id'],
                'labResultDate' => $request['labResultDate'],
                'results' => $request['results'],

                'updated_at' => now(),
            ]);

            $action ='updated labResult where id-'.$id;
            $user = Auth::user();
            if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $action);
            }
        return response('updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $action ='deleted labResult-'.$id;
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }

        Lab_results::destroy($id);

       
        return response('deleted');
    }
}
