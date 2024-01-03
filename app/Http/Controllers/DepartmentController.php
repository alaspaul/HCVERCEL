<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\resident;
use Illuminate\Support\Facades\Auth;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Department::all();
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
        $latestorder = Department::all()->count();
        $last_id = Department::select('department_id')->orderBy('created_at', 'desc')->first()->department_id;
        $currentId = 'D' . $latestorder;


        if( !empty(Department::select('department_id')->where('department_id', $currentId)->first()->department_id)){
        do{
            $latestorder++;
            $depId = 'D'. $latestorder;
            $id = Department::select('department_id')->where('department_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId = 'D' . $latestorder;

        Department::insert([
            'department_id' => $newId,
            'department_name' => $request['department_name'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $action ='created a new Department-'. $request['department_name'];

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
    public function show(Department $department)
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
        $action ='updated a Department where id-'. $id;
        
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }

        Department::where('department_id', $id)->update(['department_name' => $request['department_name']]);

        return response('done');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $action ='deleted a Department-'. $this->getDepNamebyId($id);

        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }
  
        Department::destroy($id);

       
       return response('deleted');
    }



    public function getDepNamebyId($department_id){

        $name = Department::select('department_name')->where('department_id', $department_id)->first()->department_name;


        return $name;
    }
}
