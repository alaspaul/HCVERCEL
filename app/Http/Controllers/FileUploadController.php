<?php

namespace App\Http\Controllers;
use App\AppConstants;
use App\Models\fileUpload;
use App\Models\resident;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FileUploadController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $files = fileUpload::where('isDeleted', false)->get();

        return response()->json($files);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $valid = $this->ValidateFile($request);

        if($valid == false){
            return response()->json('invalid input');
        }

        $file = $request->file('file');
        if(empty(fileUpload::where('file_name', $file->getClientOriginalName())->first())){
            $path = Storage::putFileAs(
                'file/'. $user['resident_id'] . '/' . $request['patient_id'],  $file,  $file->getClientOriginalName()
            );
        }else{
            return response()->json('file with filename ' . $file->getClientOriginalName() . ' already exist');
        }

        $newId = $this->createNewId($request);
        if($user['role'] == 'admin'){
            return response()->json('admins cannot add a file to a patient');
        }else{

        fileUpload::insert(['file_id' => $newId,
        'file_path' => $path,
        'file_name'=> $file->getClientOriginalName(),
        'file_size'=> $file->getSize(),
        'file_ext'=> $file->extension(),
        'patient_id' => $request['patient_id'],
        'resident_id'=> $user['resident_id'],
        'created_at' => now()
        ]);
        }

        $action = new AppConstants;
        $this->LogAction($action->add, $request['patient_id']);
        return response()->json($file->getClientOriginalName().' file uploaded');
    }
    /**
     * Delete a file by its ID.
     *
     * @param int $id The ID of the file to be deleted.
     * @return \Illuminate\Http\JsonResponse The JSON response indicating the result of the deletion.
     */
    public function destroy($id)
    {
        $file = fileUpload::select('file_name')->where('file_id', $id)->where('isDeleted', false)->first()->file_name;

        if (empty($file)) {
            return response()->json('file not found');
        }

        $action = new AppConstants;
        $this->LogAction($action->delete, $file['patient_id']);

        
        Storage::delete('file/'.  $file);
        fileUpload::destroy($id);


        return response()->json($file . ' has been Deleted');
    }

    /**
     * Download a file by its ID.
     *
     * @param int $file_id The ID of the file to be downloaded.
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse The file download response or JSON response if the file is not found.
     */
    public function download($file_id)
    {
        $file = fileUpload::where('file_id', $file_id)->where('isDeleted', false)->first();

        // Check if the file record exists
        if (!$file) {
            return response()->json('File not found');
        }

        $action = new AppConstants;
        $this->LogAction($action->download, $file['patient_id']);

        $pathToFile = storage_path('app/' . $file['file_path']);

        // Check if the file itself exists
        if (file_exists($pathToFile)) {
            return response()->download($pathToFile);
        } else {
            return response()->json('File not found');
        }
    }
    
    /**
     * Retrieves files based on resident ID and patient ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFiles(Request $request)
    {
        // Retrieve resident ID and patient ID from the request
        $resId = $request['resident_id'];
        $patId = $request['patient_id'];

        // Query the fileUpload table to get files matching the resident ID and patient ID
        $data = fileUpload::where('resident_id', $resId)
            ->where('patient_id', $patId)
            ->where('isDeleted', false)
            ->get();

        // Return the files as a JSON response
        return response()->json($data);
    }

    /**
     * Retrieves files based on patient ID.
     *
     * @param  int  $patient_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFilesByPatient($patient_id)
    {
        // Query the fileUpload table to get files matching the patient ID
        $data = fileUpload::where('patient_id', $patient_id)
            ->where('isDeleted', false)
            ->get();

        // Return the files as a JSON response
        return response()->json($data);
    }

    /**
     * Retrieves and displays a file based on its ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function viewFile($id)
    {
        // Query the fileUpload table to get the file matching the ID
        $file = fileUpload::where('file_id', $id)
            ->where('isDeleted', false)
            ->first();

        // Make sure the file record is found
        if ($file) {
            $pathToFile = storage_path('app/' . $file['file_path']);

            // Check if the file exists
            if (Storage::exists($file['file_path'])) {
                // Return the file as a response
                return response()->file($pathToFile);
            } else {
                // Return a JSON response indicating that the file was not found
                return response()->json('File not found');
            }
        } else {
            // Return a JSON response indicating that the file record was not found
            return response()->json('File record not found');
        }
    }

    /**
     * Deletes a file based on its ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        // Query the fileUpload table to get the file matching the ID
        $file = fileUpload::where('file_id', $id)
            ->where('isDeleted', false)
            ->first();

        // Check if the file record exists
        if (!$file) {
            // Return a JSON response indicating that the file was not found
            return response()->json('File not found');
        }

        // Create an instance of the AppConstants class
        $action = new AppConstants;

        // Log the delete action
        $this->LogAction($action->delete, $file['patient_id']);

        // Soft delete the file by updating the 'isDeleted' flag and 'updated_at' timestamp
        fileUpload::where('file_id', $id)
            ->update([
                'isDeleted' => true,
                'updated_at' => now()
            ]);

        // Return a JSON response indicating that the file was deleted
        return response()->json('File deleted');
    }

    /**
     * Validates the file and the patient ID in the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool  Returns true if the file and patient ID are valid, false otherwise.
     */
    private function ValidateFile(Request $request){
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|max:10240',
            'patient_id' => 'required',
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }
    /**
     * Logs an action with the specified action and patient ID.
     *
     * @param string $action The action to be logged.
     * @param int $patientid The ID of the patient.
     * @return void
     */
    private function LogAction($action, $patientid){
        $action = $action .' file ' . 'for patient-' . $patientid;

        $user = Auth::user();
        if($user['role'] != 'admin'){
            $log = new ResActionLogController;
            $log->store(Auth::user(), $action);
        }
    }

    /**
     * Generates a new unique file ID based on the current date and the number of existing file uploads.
     *
     * @param Request $request The request object.
     * @return string The new file ID.
     */

    private function createNewId(Request $request){

        $time = now();
        $date = new Carbon( $time ); 
        $latestorder = fileUpload::all()->count();
        $currentId = $date->year . $date->month  . 'FU' . $latestorder;


        if( !empty(fileUpload::select('file_id')->where('file_id', $currentId)->first()->file_id)){
        do{
            $latestorder++;
            $depId =  $date->year . $date->month  . 'FU' . $latestorder;
            $id = fileUpload::select('file_id')->where('file_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId = $date->year . $date->month  . 'FU' . $latestorder;


        return $newId;
    }

}
