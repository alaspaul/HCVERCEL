<?php

namespace App\Http\Controllers;

use App\AppConstants;
use App\Models\medicine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MedicineController extends Controller
{
    


    /**
     * Retrieve all medicines that are not marked as deleted.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = medicine::where('isDeleted', false)->get();

        return response()->json($data);
    }
/**
 * Store a newly created medicine in the database.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function store(Request $request)
    {
        // Validate the input
        if ($this->ValidateMedicine($request) == false){
            return response('invalid input');
        }

        // Generate a new ID for the medicine
        $newId = $this->createNewId($request);

        // Insert the medicine data into the database
        medicine::insert([
            'medicine_id' =>  $newId,
            'medicine_name' => $request['medicine_name'],
            'medicine_brand' => $request['medicine_brand'],
            'medicine_dosage' => $request['medicine_dosage'],
            'medicine_type' => $request['medicine_type'],
            'medicine_price' => $request['medicine_price'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Log the action of adding a new medicine
        $action = new AppConstants;
        $this->LogAction($action->add, $newId);

    return response('stored');
    }
    /**
     * Update a medicine record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($this->ValidateMedicine($request) == false){
            return response('invalid input');
        }

        $med = medicine::where('medicine_id', $id)->where('isDeleted', false)->first();
        if(empty($med)){
            return response('medicine not found');
        }
        
        medicine::where('medicine_id', $id)->where('isDeleted', false)->update(
            [        
                'medicine_id' => $request['medicine_id'],
                'medicine_name' => $request['medicine_name'],
                'medicine_brand' => $request['medicine_brand'],
                'medicine_dosage' => $request['medicine_dosage'],
                'medicine_type' => $request['medicine_type'],
                'medicine_price' => $request['medicine_price'],
                'updated_at' => now(),
            ]);
            
        $action = new AppConstants;
        $this->LogAction($action->edit, $id);
        return response('updated');
    }
    /**
     * Delete a medicine by its ID.
     *
     * @param int $id The ID of the medicine to delete.
     * @return \Illuminate\Http\Response The response indicating the result of the deletion.
     */
    public function destroy($id)
    {
        $med = medicine::where('medicine_id', $id)->where('isDeleted', false)->first();
        if(empty($med)){
            return response('medicine not found');
        }

        $action = new AppConstants;
        $this->LogAction($action->delete, $id);

        medicine::destroy($id);

       
       return response('deleted');
    }

    /**
     * Get the name of a medicine by its ID.
     *
     * @param int $medicine_id The ID of the medicine.
     * @return string|\Illuminate\Http\Response The name of the medicine or a response indicating the medicine was not found.
     */
    public static function getMedNamebyId($medicine_id){

        $med = medicine::where('medicine_id', $medicine_id)->where('isDeleted', false)->first();
        if(empty($med)){
            return response('medicine not found');
        }

        $name = $med['medicine_name'];


        return $name;
    }

    /**
     * Soft delete a medicine by its ID.
     *
     * @param int $id The ID of the medicine to delete.
     * @return \Illuminate\Http\Response The response indicating the result of the deletion.
     */
    public function deleteMedicine($id){
        $med = medicine::where('medicine_id', $id)->where('isDeleted', false)->first();
        if(empty($med)){
            return response('medicine not found');
        }

        $action = new AppConstants;
        $this->LogAction($action->delete, $id);

        medicine::where('medicine_id', $id)->where('isDeleted', false)->update(
            [
                'isDeleted' => true,
                'updated_at' => now()
            ]);

        return response('deleted');
    }

    /**
     * Validates the medicine data from the request.
     *
     * @param  Illuminate\Http\Request  $request
     * @return bool  Returns true if the validation passes, false otherwise.
     */
    private function ValidateMedicine(Request $request){
        // Validation rules for the medicine data
        $validator = Validator::make($request->all(), [
            'medicine_name' => ['required', 'string', 'max:255'],
            'medicine_brand' => ['required', 'string', 'max:255'],
            'medicine_dosage' => ['required', 'string', 'max:255'],
            'medicine_type' => ['required', 'string', 'max:255'],
            'medicine_price' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }

    /**
     * Logs the action performed on a medicine.
     *
     * @param  string  $action  The action performed on the medicine.
     * @param  int  $id  The ID of the medicine.
     * @return void
     */
    private function LogAction($action, $id){
        $newAction = $action. ' medicine - '. $id;
        $user = Auth::user();
        if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $newAction);
        }
    }

    /**
     * Creates a new ID for a medicine based on the latest order.
     *
     * @param  Illuminate\Http\Request  $request
     * @return string  The newly generated ID for the medicine.
     */
    private function createNewId(Request $request){
        // Get the count of all medicines
        $latestorder = medicine::all()->count();
        $currentId = 'M' . $latestorder;

        // Check if the current ID already exists in the database
        if( !empty( medicine::select('medicine_id')->where('medicine_id', $currentId)->first()->medicine_id )){
            do{
                $latestorder++;
                $depId = 'M'. $latestorder;
                $id = medicine::select('medicine_id')->where('medicine_id', $depId)->first();
             
            }while(!empty($id));
        }

        $newId = 'M' . $latestorder;

        return $newId;
    }

}
