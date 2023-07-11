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

Route::POST('departments/edit{department}', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::POST('departments/updateDep{department}', [DepartmentController::class, 'updateDep'])->name('departments.updateDep');

Route::POST('floors/edit{floor}', [floorController::class, 'edit'])->name('floors.edit');
Route::POST('floors/updateFloor{floor}', [floorController::class, 'updateFloor'])->name('floors.updateFloor');

Route::POST('medecine/edit{medecine}', [medecineController::class, 'edit'])->name('medecine.edit');
Route::POST('medecine/updateMeds{medecine}', [medecineController::class, 'updateMeds'])->name('medecine.updateMeds');

Route::POST('patients/edit{patient}', [patientController::class, 'edit'])->name('patients.edit');
Route::POST('patients/updatePatient{patient}', [patientController::class, 'updatePatient'])->name('patients.updatePatient');

Route::POST('residents/edit{resident}', [residentController::class, 'edit'])->name('residents.edit');
Route::POST('residents/updateResident{resident}', [residentController::class, 'updateResident'])->name('residents.updateResident');

Route::POST('result/edit{result}', [resultController::class, 'edit'])->name('result.edit');
Route::POST('result/updateResult{result}', [resultController::class, 'updateResult'])->name('result.updateResults');

Route::POST('vital/edit{vital}', [vitalController::class, 'edit'])->name('vital.edit');
Route::POST('vital/updateVital{vital}', [vitalController::class, 'updateVital'])->name('vital.updateVital');


Route::POST('room/edit{room}', [roomController::class, 'edit'])->name('room.edit');
Route::POST('room/updateRoom{room}', [roomController::class, 'updateRoom'])->name('room.updateRoom');