<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ResidentAssignedRoomController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\medicineController;
use App\Http\Controllers\DoctorsNotesController;
use App\Http\Controllers\InfomedicineController;
use App\Http\Controllers\InfoResultsController;
use App\Http\Controllers\LabResultController;
use App\Http\Controllers\PatientHealthRecordController;
use App\Http\Controllers\PatientHistoryController;
use App\Http\Controllers\PatientInfoController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PhysicalExamController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\VitalController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\infoHistoryController;
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







Route::post('/login', [loginController::class, 'loginResident'])->name('loginRes');




Route::apiResource('residents', ResidentController::class);





Route::group(['middleware' => ['authCheck']], function(){
    Route::get('/logout', [loginController::class, 'logoutRes'])->name('logout');

    
    Route::apiResource('ResAssRooms', ResidentAssignedRoomController::class);
    Route::apiResource('patients', PatientController::class);
    Route::apiResource('departments', DepartmentController::class);

Route::apiResource('floors', FloorController::class);
Route::apiResource('medicines', medicineController::class);
Route::apiResource('doctorsNotes', DoctorsNotesController::class);
Route::apiResource('Infomedicine', InfomedicineController::class);
Route::apiResource('InfoResults', InfoResultsController::class);
Route::apiResource('LabResults', LabResultController::class);
Route::apiResource('PatientHealthRecord', PatientHealthRecordController::class);
Route::apiResource('PatientInfos', PatientInfoController::class);
Route::apiResource('PhysicalExams', PhysicalExamController::class);
Route::apiResource('Results', ResultController::class);
Route::apiResource('Vitals', VitalController::class);
Route::apiResource('Rooms', RoomController::class);
Route::apiResource('histories', historyController::class);
Route::apiResource('patientHistories', patientHistoryController::class);
Route::apiResource('infoHistories', infoHistoryController::class);

Route::POST('departments/edit{department}', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::POST('departments/updateDep{department}', [DepartmentController::class, 'updateDep'])->name('departments.updateDep');

Route::POST('floors/edit{floor}', [floorController::class, 'edit'])->name('floors.edit');
Route::POST('floors/updateFloor{floor}', [floorController::class, 'updateFloor'])->name('floors.updateFloor');

Route::POST('medicines/edit{medicine}', [medicineController::class, 'edit'])->name('medicines.edit');
Route::POST('medicines/updateMeds{medicine}', [medicineController::class, 'updateMeds'])->name('medicines.updateMeds');

Route::POST('patients/edit{patient}', [patientController::class, 'edit'])->name('patients.edit');
Route::POST('patients/updatePatient{patient}', [patientController::class, 'updatePatient'])->name('patients.updatePatient');

Route::POST('residents/edit{resident}', [residentController::class, 'edit'])->name('residents.edit');
Route::POST('residents/updateResident{resident}', [residentController::class, 'updateResident'])->name('residents.updateResident');

Route::POST('results/edit{result}', [resultController::class, 'edit'])->name('results.edit');
Route::POST('results/updateResult{result}', [resultController::class, 'updateResult'])->name('results.updateResults');

Route::POST('vitals/edit{vital}', [vitalController::class, 'edit'])->name('vitals.edit');
Route::POST('vitals/updateVital{vital}', [vitalController::class, 'updateVital'])->name('vitals.updateVital');


Route::POST('rooms/edit{room}', [roomController::class, 'edit'])->name('rooms.edit');
Route::POST('rooms/updateRoom{room}', [roomController::class, 'updateRoom'])->name('rooms.updateRoom');




});



