<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\resident;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ResidentController extends Controller
{
           


        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = resident::all();
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
        $depId = department::select('department_id')->where('department_id',  $request['department_id'] )->first()->department_id;

        $latestorder = resident::where('department_id', $depId)->count();
        $last_id = resident::select('resident_id')->orderBy('created_at', 'desc')->first()->resident_id;
        $currentId = $date->year . $depId . 'R' . $latestorder;
        

        if( !empty(resident::select('resident_id')->where('resident_id', $currentId)->first()->resident_id)){
        do{
            $latestorder++;
            $residentId = $date->year . $depId . 'R' . $latestorder;
            $id = resident::select('resident_id')->where('resident_id', $residentId)->first();
         
        }while(!empty($id));
        }
         $newId = $date->year . $depId . 'R' . $latestorder;


        resident::insert([
            'resident_id' =>  $newId,
            'resident_userName' => $request['resident_userName'],
            'resident_fName' => $request['resident_fName'],
            'resident_lName' => $request['resident_lName'],
            'resident_mName' => $request['resident_mName'],
            'resident_password' => bcrypt($request['resident_password']),
            'department_id' => $request['department_id'],
            'role' => $request['role'],
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $action ='added a new resident-'. $request['resident_lName']. $request['resident_fName'];
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);
        return response('store');
    }

    /**
     * Display the specified resource.
     */
    public function show($residentId)
    {
        try{
            $resident = Resident::findOrFail($residentId);
            return response()->json($resident);
        }catch(\Exception $e){
            return response()->json(['error'=>'resident not found'], 404);
        }
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
        $dataToUpdate = [
            'resident_userName' => $request['resident_userName'],
            'resident_fName' => $request['resident_fName'],
            'resident_lName' => $request['resident_lName'],
            'resident_mName' => $request['resident_mName'],
            'department_id' => $request['department_id'],
            'role' => $request['role'],
            'updated_at' => now(),
        ];

        // Check if the password field is empty, if so, remove it from the update array
        if (empty($request['resident_password'])) {
            unset($dataToUpdate['resident_password']);
        } else {
            // If the password is not empty, update it in the array
            $dataToUpdate['resident_password'] = bcrypt($request['resident_password']);
        }

        resident::where('resident_id', $id)->update($dataToUpdate);

        $action ='updated a resident where id-'. $id;
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);

        return response('updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lname = resident::select('resident_lName')->where('resident_id', $id)->first()->resident_lName;
        $fname = resident::select('resident_fName')->where('resident_id', $id)->first()->resident_fName;
        $action ='deleted a resident-'. $lname. $fname;
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);
       resident::destroy($id);

       return response('deleted');
    }


    public function updateResident(Request $request, $id)
    {
       
        $dataToUpdate = [
            'resident_userName' => $request['resident_userName'],
            'resident_fName' => $request['resident_fName'],
            'resident_lName' => $request['resident_lName'],
            'resident_mName' => $request['resident_mName'],
            'department_id' => $request['department_id'],
            'role' => $request['role'],
            'updated_at' => now(),
        ];

        // Check if the password field is empty, if so, remove it from the update array
        if (empty($request['resident_password'])) {
            unset($dataToUpdate['resident_password']);
        } else {
            // If the password is not empty, update it in the array
            $dataToUpdate['resident_password'] = bcrypt($request['resident_password']);
        }

        resident::where('resident_id', $id)->update($dataToUpdate);

        $action ='updated a resident where id-'. $id;
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);

        return response('updated');
    }

  
   
}
