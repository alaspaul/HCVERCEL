<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Resident;
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
        $data = Resident::all();
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
        $depId = Department::select('department_id')->where('department_id',  $request['department_id'] )->first()->department_id;

        $latestorder = Resident::where('department_id', $depId)->count();
        $last_id = Resident::select('resident_id')->orderBy('created_at', 'desc')->first()->resident_id;
        $currentId = $date->year . $depId . 'R' . $latestorder;
        

        if( !empty(Resident::select('resident_id')->where('resident_id', $currentId)->first()->resident_id)){
        do{
            $latestorder++;
            $residentId = $date->year . $depId . 'R' . $latestorder;
            $id = Resident::select('resident_id')->where('resident_id', $residentId)->first();
         
        }while(!empty($id));
        }
         $newId = $date->year . $depId . 'R' . $latestorder;


         Resident::insert([
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
       

        $action ='added a new Resident-'. $request['resident_lName']. $request['resident_fName'];
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
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
            return response()->json(['error'=>'Resident not found'], 404);
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

        Resident::where('resident_id', $id)->update($dataToUpdate);

        $action ='updated a Resident where id-'. $id;
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
        $lname = Resident::select('resident_lName')->where('resident_id', $id)->first()->resident_lName;
        $fname = Resident::select('resident_fName')->where('resident_id', $id)->first()->resident_fName;

        $action ='deleted a Resident-'. $lname. $fname;
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
       Resident::destroy($id);

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

      
        if (empty($request['resident_password'])) {
            unset($dataToUpdate['resident_password']);
        } else {
            $dataToUpdate['resident_password'] = bcrypt($request['resident_password']);
        }

        Resident::where('resident_id', $id)->update($dataToUpdate);

        $action ='updated a Resident where id-'. $id;
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }

        return response('updated');
    }

    public function residentName($resident_id)
    {
        $lname = Resident::select('resident_lName')->where('resident_id', $resident_id)->first()->resident_lName;
        $fname = Resident::select('resident_fName')->where('resident_id', $resident_id)->first()->resident_fName;
        $mname = Resident::select('resident_mName')->where('resident_id', $resident_id)->first()->resident_mName;



        return ['lastName' => $lname, 'firstName' => $fname, 'middleName' => $mname];
    }

    public function allRes(){
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $userid = $user->resident_id;

        $residents = Resident::where('resident_id','!=', $userid)->get();
    

        return response()->json($residents);
        }
    }
   
}
