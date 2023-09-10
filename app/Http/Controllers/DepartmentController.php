<?php

namespace App\Http\Controllers;

use App\Models\department;
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

        $data = department::all();
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
        $latestorder = department::all()->count();
        $last_id = department::select('department_id')->orderBy('created_at', 'desc')->first()->department_id;
        $currentId = 'D' . $latestorder;


        if( !empty(department::select('department_id')->where('department_id', $currentId)->first()->department_id)){
        do{
            $latestorder++;
            $depId = 'D'. $latestorder;
            $id = department::select('department_id')->where('department_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId = 'D' . $latestorder;

        department::insert([
            'department_id' => $newId,
            'department_name' => $request['department_name'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $action ='created a new department-'. $request['department_name'];
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);
 
        return response('stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(department $department)
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
        $action ='updated a department where id-'. $id;
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);

        department::where('department_id', $id)->update(['department_name' => $request['department_name']]);

        return response('done');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $action ='deleted a department-'. $this->getDepNamebyId($id);
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);

       department::destroy($id);

       
       return response('deleted');
    }


    public function updateDep(Request $request, $id)
    {
        $action ='updated a department-'. $id;
        app('App\Http\Controllers\resActionLogController')->store(Auth::user(), $action);

        department::where('department_id', $id)->update(['department_name' => $request['department_name']]);

        return response('updated');

    }

    public function getDepNamebyId($department_id){
        $name = department::select('department_name')->where('department_id', $department_id)->first()->department_name;


        return $name;
    }
}
