<?php

namespace App\Http\Controllers;

use App\AppConstants;
use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class DepartmentController extends Controller
{
    /**
     * Retrieve all departments that are not marked as deleted.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $data = department::where('isDeleted', false)->get();
        return $data;
    }

    /**
     * Store a newly created department in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $this->ValidateDepartment($request);

        if($valid == false){
            return response('invalid input');
        }
        
        $newId = $this->createNewId($request);
        
        department::insert([
            'department_id' => $newId,
            'department_name' => $request['department_name'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $action = new AppConstants;
        $this->LogAction($action->add, $newId);

        return response('stored');
    }

    /**
     * Update a department.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = $this->ValidateDepartment($request);

        if($valid == false){
            return response('invalid input');
        }

        $department = department::where('department_id', $id)->where('isDeleted', false)->first();
        if($department == null){
            return response('department does not exist');
        }

        department::where('department_id', $id)->update(['department_name' => $request['department_name']]);

        $action = new AppConstants;
        $this->LogAction($action->edit, $id);

        return response('done');
    }

    /**
     * Delete a department by its ID.
     *
     * @param  int  $id  The ID of the department to be deleted.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = department::where('department_id', $id)->where('isDeleted', false)->first();
        if($department == null){
            return response('department does not exist');
        }
        
        $action = new AppConstants;
        $this->LogAction($action->delete, $id);

        department::destroy($id);

        return response('deleted');
    }


    /**
     * Get the department name by its ID.
     *
     * @param int $department_id The ID of the department.
     * @return string|null The name of the department, or null if the department does not exist.
     */
    public function getDepNamebyId($department_id){

        $department = department::where('department_id', $department_id)->where('isDeleted', false)->first();
        if($department == null){
            return response('department does not exist');
        }

        $name = department::select('department_name')->where('department_id', $department_id)->first()->department_name;
        return $name;
    }

    /**
     * Delete a department by its ID.
     *
     * @param int $id The ID of the department to be deleted.
     * @return \Illuminate\Http\Response The response indicating the result of the deletion.
     */
    public function deleteDepartment($id){
        $department = department::where('department_id', $id)->where('isDeleted', false)->first();
        if($department == null){
            return response('department does not exist');
        }
        
        $action = new AppConstants;
        $this->LogAction($action->delete, $id);

        department::where('department_id', $id)->update(
            ['isDeleted' => true, 
             'updated_at' => now()]);

       
       return response('deleted');
    }

    /**
     * Validates the department data from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool  Returns true if the department data is valid, false otherwise.
     */
    private function ValidateDepartment(Request $request){
        // Validation rules for the department_name field
        $validator = Validator::make($request->all(), [
            'department_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }

    /**
     * Logs the action performed on a department.
     *
     * @param  string  $action  The action performed on the department.
     * @param  int  $id  The ID of the department.
     * @return void
     */
    private function LogAction($action, $id){
        $newAction = $action . ' department - ' . $id;
        $user = Auth::user();
        if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $newAction);
        }
    }

    /**
     * Creates a new ID for a department.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string  The newly generated department ID.
     */
    private function createNewId(Request $request){
        // Get the count of existing departments
        $latestorder = department::all()->count();
        $currentId = 'D' . $latestorder;

        // Check if the current ID already exists in the database
        if( !empty(department::select('department_id')->where('department_id', $currentId)->first()->department_id)){
            do{
                $latestorder++;
                $depId = 'D'. $latestorder;
                $id = department::select('department_id')->where('department_id', $depId)->first();
            
            }while(!empty($id));
        }

        $newId = 'D' . $latestorder;

        return $newId;
    }
}
