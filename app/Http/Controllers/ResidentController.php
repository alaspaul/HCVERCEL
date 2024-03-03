<?php

namespace App\Http\Controllers;


use App\Models\department;
use App\Models\resident;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\AppConstants;
class ResidentController extends Controller
{
           


    /**
     * Retrieve all residents from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $data = resident::where('isDeleted', false)->get();
        return $data;
    }

    /**
     * Store a new resident in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if ($this->ValidateResident($request) == false){
            return response('invalid input');
        }

        $newId = $this->createNewId($request);

        resident::insert([
            'resident_id' =>  $newId,
            'resident_userName' => $request['resident_userName'],
            'resident_fName' => $request['resident_fName'],
            'resident_lName' => $request['resident_lName'],
            'resident_mName' => $request['resident_mName'],
            'resident_gender' => $request['resident_gender'],
            'resident_password' => bcrypt($request['resident_password']),
            'department_id' => $request['department_id'],
            'isDeleted' => false,
            'role' => $request['role'],
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $action = new AppConstants;
        $this->LogAction($action->add, $newId);

        return response('store');
    }

    /**
     * Retrieve a specific resident from the database.
     *
     * @param  int  $residentId
     * @return \Illuminate\Http\Response
     */
    public function show($residentId)
    {
        try{
            $resident = resident::where('isDeleted', false)->findOrFail($residentId);

            if ($resident->isEmpty()) {
                return response('resident not found');
            }

            return response()->json($resident);
        }catch(\Exception $e){
            return response()->json(['error'=>'resident not found'], 404);
        }
    }

    /**
     * Update a resident record.
     *
     * @param Request $request The HTTP request object.
     * @param int $id The ID of the resident to be updated.
     * @return \Illuminate\Http\Response The HTTP response.
     */
    public function update(Request $request, $id)
    {
        // Validate the input
        if ($this->ValidateResident($request) == false){
            return response('invalid input');
        }

        // Check if the resident exists
        $res = resident::where('resident_id', $id)->where('isDeleted', false)->first();
        if (empty($res)) {
            return response('resident not found');
        }

        // Prepare the data to be updated
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

        // Update the resident record
        resident::where('resident_id', $id)->update($dataToUpdate);

        // Log the action
        $action = new AppConstants;
        $this->LogAction($action->edit, $id);

        return response('updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $res = resident::where('resident_id', $id)->where('isDeleted', false)->first();
        if (empty($res)) {
            return response('resident not found');
        }

        $action = new AppConstants;
        $this->LogAction($action->delete, $id);

        resident::destroy($id);

       return response('deleted');
    }

    /**
     * Get the name of a resident.
     *
     * @param int $resident_id The ID of the resident.
     * @return \Illuminate\Http\Response The HTTP response.
     */
    public function residentName($resident_id)
    {
        // Check if the resident exists
        $res = resident::where('resident_id', $resident_id)->where('isDeleted', false)->first();
        if (empty($res)) {
            return response('resident not found');
        }

        // Get the last name, first name, and middle name of the resident
        $lname = $res['resident_lName'];
        $fname = $res['resident_fName'];
        $mname = $res['resident_mName'];
        
        return response()->json(['lastName' => $lname, 'firstName' => $fname, 'middleName' => $mname]);
    }

    /**
     * Get all residents.
     *
     * @return \Illuminate\Http\Response The HTTP response.
     */
    public function allRes()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is an admin
        if ($user['role'] != 'admin') {
            $userid = $user->resident_id;
            $residents = resident::where('resident_id','!=', $userid)->where('isDeleted', false)->get();
            return response()->json($residents);
        }

        // If the user is an admin, get all residents
        $residents = resident::where('isDeleted', false)->get();
        return response()->json($residents);
    }

    /**
     * Delete a resident.
     *
     * @param int $residentId The ID of the resident to be deleted.
     * @return \Illuminate\Http\Response The HTTP response.
     */
    public function deleteResident($residentId)
    {
        // Check if the resident exists
        $res = resident::where('resident_id', $residentId)->where('isDeleted', false)->first();
        if (empty($res)) {
            return response('resident not found');
        }

        // Log the action
        $action = new AppConstants;
        $this->LogAction($action->delete, $residentId);

        // Soft delete the resident
        resident::where('resident_id', $residentId)->where('isDeleted', false)->update(
            [
                'isDeleted' => true,
                'updated_at' => now()]);

        return response('deleted');
    }
    /**
     * Validates the resident data from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool  Returns true if the resident data is valid, false otherwise.
     */
    private function ValidateResident($request){
        $validator = Validator::make($request->all(), [           
            'resident_userName' => ['required', 'string', 'max:255'],
            'resident_fName' => ['required', 'string', 'max:255'],
            'resident_lName' => ['required', 'string', 'max:255'],
            'resident_mName' => ['required', 'string', 'max:255'],
            'resident_gender' => ['required', 'string', 'max:20'],
            'department_id' => ['required', 'string', 'max:20'],
            'role' => ['required', 'string', 'max:50'],
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }
    /**
     * Logs an action performed on a resident.
     *
     * @param string $action The action performed.
     * @param int $id The ID of the resident.
     * @return void
     */
    private function LogAction($action, $id){
        $newAction = $action . ' resident - ' . $id;
        $user = Auth::user();
        if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $newAction);
        }
    }

    /**
     * Generates a new resident ID based on the given request.
     *
     * @param  $request  The request data.
     * @return string  The newly generated resident ID.
     */
    private function createNewId(Request $request){
        $time = now();
        $date = new Carbon( $time ); 
        $depId = department::select('department_id')->where('department_id',  $request['department_id'] )->first()->department_id;

        $latestorder = resident::where('department_id', $depId)->count();
        $currentId = $date->year . $depId . 'R' . $latestorder;
        

        if( !empty(resident::select('resident_id')->where('resident_id', $currentId)->first()->resident_id)){
        do{
            $latestorder++;
            $residentId = $date->year . $depId . 'R' . $latestorder;
            $id = resident::select('resident_id')->where('resident_id', $residentId)->first();
         
        }while(!empty($id));
        }
        
        $newId = $date->year . $depId . 'R' . $latestorder;

        return $newId;
    }
    
}