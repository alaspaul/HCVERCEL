<?php

namespace App\Http\Controllers;

use App\AppConstants;
use App\Models\floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class FloorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $data = floor::where('isDeleted', false)->get();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $this->ValidateFloor($request);

        if($valid == false){
            return response('invalid input');
        }

        $newId = $this->createNewId($request);

        floor::insert([
            'floor_id' => $newId,
            'floor_name' => $request['floor_name'],
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $action = new AppConstants;
        $this->LogAction($action->add, $newId);

        return response('stored');
    }

    /**
     * Update the specified floor in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = $this->ValidateFloor($request);

        if($valid == false){
            return response('invalid input');
        }

        $floor = floor::where('floor_id', $id)->where('isDeleted', false)->first();
        if($floor == null){
            return response('floor does not exist');
        }

        floor::where('floor_id', $id)->update(
            [
                'floor_name' => $request['floor_name'],
                'updated_at' => now(),
            ]);

        $action = new AppConstants;
        $this->LogAction($action->update, $id);

        return response('updated');
    }


    /**
     * Remove the specified floor from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = new AppConstants;
        $this->LogAction($action->delete, $id);

        floor::destroy($id);

    
    return response('deleted');
    }

    /**
     * Get the floor name by its ID.
     *
     * @param int $floor_id The ID of the floor.
     * @return string|Response The name of the floor or a response indicating that the floor does not exist.
     */
    public function getFloorNamebyId($floor_id){

        $floor = floor::where('floor_id', $floor_id)->where('isDeleted', false)->first();
        if($floor == null){
            return response('floor does not exist');
        }

        $name = floor::select('floor_name')->where('floor_id', $floor_id)->first()->floor_name;

        return $name;
    }

    /**
     * Delete a floor by its ID.
     *
     * @param int $id The ID of the floor to delete.
     * @return Response A response indicating that the floor has been deleted or that the floor does not exist.
     */
    public function deleteFloor($id){
        
        $floor = floor::where('floor_id', $id)->where('isDeleted', false)->first();
        if($floor == null){
            return response('floor does not exist');
        }

        floor::where('floor_id', $id)->update(
            [
                'isDeleted' => true,
                'updated_at' => now(),
            ]);

        $action = new AppConstants;
        $this->LogAction($action->delete, $id);

        return response('deleted');
    }

    /**
     * Validates the floor data from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool  Returns true if the floor data is valid, false otherwise.
     */
    private function ValidateFloor(Request $request){
        $validator = Validator::make($request->all(), [
            'floor_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }

    /**
     * Logs the action performed on a floor.
     *
     * @param  string  $action  The action performed on the floor.
     * @param  int  $floorid  The ID of the floor.
     * @return void
     */
    private function LogAction($action, $floorid){
        $newAction = $action .' floor ' . $floorid;

        $user = Auth::user();
        if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $newAction);
        }
    }

    /**
     * Generates a new unique floor ID based on the existing floor IDs.
     *
     * @param Request $request The request object.
     * @return string The new floor ID.
     */

    private function createNewId(Request $request){

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
        return $newId;
    }
}
