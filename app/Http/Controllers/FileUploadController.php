<?php

namespace App\Http\Controllers;
use App\Models\Patient;

use App\Models\FileUpload;
use App\Http\Controllers\ResActionLogController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = FileUpload::all();

        return response()->json($files);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $file = $request->file('file');
        if(empty(FileUpload::where('file_name', $file->getClientOriginalName())->first())){
            $path = Storage::putFileAs(
                'file/'. $user['resident_id'],  $file,  $file->getClientOriginalName()
            );
        }else{
            return response()->json('file with filename ' . $file->getClientOriginalName() . ' already exist');
        }



        $time = now();
        $date = new Carbon( $time ); 
        $latestorder = FileUpload::all()->count();
        $currentId = $date->year . $date->month  . 'FU' . $latestorder;


        if( !empty(FileUpload::select('file_id')->where('file_id', $currentId)->first()->file_id)){
        do{
            $latestorder++;
            $depId =  $date->year . $date->month  . 'FU' . $latestorder;
            $id = FileUpload::select('file_id')->where('file_id', $depId)->first();
         
        }while(!empty($id));
    }

        $newId = $date->year . $date->month  . 'FU' . $latestorder;
  
        if($user['role'] == 'admin'){
            return response()->json('admins cannot add a file to a patient');
        }else{

        FileUpload::insert(['file_id' => $newId,
        'file_path' => $path,
        'file_name'=> $file->getClientOriginalName(),
        'file_size'=> $file->getSize(),
        'file_ext'=> $file->extension(),
        'patient_id' => $request['patient_id'], 
        'resident_id'=> $user['resident_id'],

        'created_at' => now()
        ]);

        }
        
           

        $patient = new PatientController;
        $patientName = $patient->getPatientName($request['patient_id']);

        $action ='uploaded a file ' . $file->getClientOriginalName() .' for patient-' . $patientName['patient_fName'];

        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }

        return response()->json($file->getClientOriginalName().' file uploaded');

    }

    /**
     * Display the specified resource.
     */
    public function show(request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FileUpload $fileUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = FileUpload::select('file_name')->where('file_id', $id)->first()->file_name;

        $action ='deleted a file ' . $file;

        $user = Auth::user();
        if($user['role'] != 'admin'){
        $log = new ResActionLogController;
        $log->store(Auth::user(), $action);
        }

        
        Storage::delete('file/'.  $file);
        FileUpload::destroy($id);


        return response()->json($file . ' has been Deleted');
    }

    public function download($file_id)
    {
      
        $file = FileUpload::where('file_id', $file_id)->first();
        $pathToFile = storage_path('app\\' . $file['file_path']);

        return response()->download($pathToFile);
    }

    public function getFiles(request $request)
    {
        $resId = $request['resident_id'];
        $patId = $request['patient_id'];

   
        $data = FileUpload::where('resident_id', $resId)->where('patient_id', $patId)->get();


        return response()->json($data);
    }

    public function viewFile($id)
    {

        $file = FileUpload::where('file_id', $id)->first();
        $pathToFile = storage_path('app\\' . $file['file_path']);

        return response()->file($pathToFile);
    }

}
