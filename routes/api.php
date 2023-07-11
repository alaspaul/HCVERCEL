<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ResidentAssignedRoomController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\MedecineController;
use App\Http\Controllers\DoctorsNotesController;
use App\Http\Controllers\InfoMedecineController;
use App\Http\Controllers\InfoResultsController;
use App\Http\Controllers\LabResultController;
use App\Http\Controllers\PatientHealthRecordController;
use App\Http\Controllers\PatientHistoryController;
use App\Http\Controllers\PatientInfoController;
use App\Http\Controllers\PatientLogController;
use App\Http\Controllers\PhysicalExamController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\VitalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function () {
    return view('welcome');
});





Route::apiResource('departments', DepartmentController::class);
Route::apiResource('ResAssRooms', ResidentAssignedRoomController::class);
Route::apiResource('residents', ResidentController::class);
Route::apiResource('patients', PatientController::class);
Route::apiResource('floors', FloorController::class);
Route::apiResource('medecine', MedecineController::class);
Route::apiResource('doctorsNotes', DoctorsNotesController::class);
Route::apiResource('InfoMedecine', InfoMedecineController::class);
Route::apiResource('InfoResults', InfoResultsController::class);
Route::apiResource('LabResult', LabResultController::class);
Route::apiResource('PatientHealthRecord', PatientHealthRecordController::class);
Route::apiResource('PatientHistory', PatientHistoryController::class);
Route::apiResource('PatientInfo', PatientInfoController::class);
Route::apiResource('PatientLog', PatientLogController::class);
Route::apiResource('PhysicalExam', PhysicalExamController::class);
Route::apiResource('Result', ResultController::class);
Route::apiResource('Vital', VitalController::class);
Route::apiResource('Room', RoomController::class);

