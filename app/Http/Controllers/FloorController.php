<?php

namespace App\Http\Controllers;

use App\Models\floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class FloorController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $data = floor::all();
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
        $validator = Validator::make($request->all(), [
            'floor_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $latestorder = floor::all()->count();
        $currentId = 'F' . $latestorder;
      
        if( !empty(floor::select('floor_id')->where('floor_id', $currentId)->first()->floor_id)){
        do{
            $latestorder++;
            $floorId = 'F'. $latestorder;
            $id = floor::select('floor_id')->where('floor_id', $floorId)->first();
         
        }while(!empty($id));
    }
    $newId = 'F'. $latestorder;

         floor::insert([ 'floor_id' => $newId,
        'floor_name' => $request['floor_name'],

        'created_at' => now(),
        'updated_at' => now()
        ]);
     
    

        $action ='created a new floor-'. $request['floor_name'];

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
    public function show(floor $floor)
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
        $validator = Validator::make($request->all(), [
            'floor_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $floor = floor::where('floor_id', $id)->first();
        if($floor == null){
            return response('floor does not exist');
        }

        $action ='updated a floor where id-'. $id;
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }

        floor::where('floor_id', $id)->update(
            [
                'floor_id' => $request['floor_id'],
                'floor_name' => $request['floor_name'],

                'updated_at' => now(),
            ]);

        return response('updated');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $action ='deleted a floor-'. $this->getFloorNamebyId($id);
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }

        floor::destroy($id);

       
       return response('deleted');
    }

    public function getFloorNamebyId($floor_id){

        $floor = floor::where('floor_id', $floor_id)->first();
        if($floor == null){
            return response('floor does not exist');
        }

        $name = floor::select('floor_name')->where('floor_id', $floor_id)->first()->floor_name;

        return $name;
    }
}
