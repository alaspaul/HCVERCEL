<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FloorController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $data = Floor::all();
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
        $latestorder = Floor::all()->count();
        $last_id = Floor::select('floor_id')->orderBy('created_at', 'desc')->first()->floor_id;
        $currentId = 'F' . $latestorder;
      
        if( !empty(Floor::select('floor_id')->where('floor_id', $currentId)->first()->floor_id)){
        do{
            $latestorder++;
            $floorId = 'F'. $latestorder;
            $id = Floor::select('floor_id')->where('floor_id', $floorId)->first();
         
        }while(!empty($id));
    }
    $newId = 'F'. $latestorder;

         Floor::insert([ 'floor_id' => $newId,
        'floor_name' => $request['floor_name'],

        'created_at' => now(),
        'updated_at' => now()
        ]);
     
    

        $action ='created a new Floor-'. $request['floor_name'];

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
    public function show(Floor $floor)
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
        $action ='updated a Floor where id-'. $id;
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }

        Floor::where('floor_id', $id)->update(
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
        $action ='deleted a Floor-'. $this->getFloorNamebyId($id);
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }

        Floor::destroy($id);

       
       return response('deleted');
    }


    public function updateFloor(Request $request, $id)
    {
       
        
        $action ='updated a Floor where id-'. $id;
        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }

        Floor::where('floor_id', $id)->update(
            [
                'floor_id' => $request['floor_id'],
                'floor_name' => $request['floor_name'],

                'updated_at' => now(),
            ]);

        return response('updated');
    }
    


    public function getFloorNamebyId($floor_id){

        $name = Floor::select('floor_name')->where('floor_id', $floor_id)->first()->floor_name;


        return $name;
    }
}
