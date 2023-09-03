<?php




use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\LabResultsController;
use App\Http\Controllers\PatientMedicineController;
use App\Models\fileUpload;
use App\Models\patient_medicine;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ResidentAssignedRoomController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\medicineController;
use App\Http\Controllers\PatientHealthRecordController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PhysicalExamController;
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




Route::post('/admin/Login', [UserController::class, 'loginAdmin'])->name('admin.login');


Route::group(['middleware' => 'auth:adminApi'],function(){
    Route::get('/admin/Check', [UserController::class, 'checker'])->name('checker');
    Route::get('/admin/Logout', [UserController::class, 'logoutAdmin'])->name('admin.logout');
    Route::apiResource('admin', UserController::class);

    Route::apiResource('residents', ResidentController::class);
    Route::POST('residents/edit{resident}', [residentController::class, 'edit'])->name('residents.edit');
    Route::POST('residents/updateResident{resident}', [residentController::class, 'updateResident'])->name('residents.updateResident');


    Route::apiResource('floors', FloorController::class);
    Route::POST('floors/edit{floor}', [floorController::class, 'edit'])->name('floors.edit');
    Route::POST('floors/updateFloor{floor}', [floorController::class, 'updateFloor'])->name('floors.updateFloor');


    Route::apiResource('departments', DepartmentController::class);
    Route::POST('departments/edit{department}', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::POST('departments/updateDep{department}', [DepartmentController::class, 'updateDep'])->name('departments.updateDep');


    Route::apiResource('medicines', medicineController::class);
    Route::POST('medicines/edit{medicine}', [medicineController::class, 'edit'])->name('medicines.edit');
    Route::POST('medicines/updateMeds{medicine}', [medicineController::class, 'updateMeds'])->name('medicines.updateMeds');


    Route::apiResource('rooms', RoomController::class);
    Route::POST('rooms/edit{room}', [roomController::class, 'edit'])->name('rooms.edit');
    Route::POST('rooms/updateRoom{room}', [roomController::class, 'updateRoom'])->name('rooms.updateRoom');
    Route::POST('rooms/getRooms{roomId}', [roomController::class, 'getRoom'])->name('rooms.getRoom');
    Route::post('rooms/getRoomsByfloor/{floor_id}', [RoomController::class, 'getRoomByFloor'])->name('room.getRoomByFloor');

});




Route::post('/login', [loginController::class, 'loginResident'])->name('loginRes');


Route::group(['middleware' => 'auth:customApi'],function(){
    Route::get('/logout', [loginController::class, 'logoutRes'])->name('logout');

    Route::apiResource('fileUpload', FileUploadController::class);
    Route::GET('fileUpload/download/{file_id}', [FileUploadController::class, 'download'])->name('fileUpload.download');

    Route::apiResource('resAssRooms', ResidentAssignedRoomController::class);
    Route::get('showResAssRoom/{resident_id}', [ResidentAssignedRoomController::class, 'show']);
    Route::GET('resAssRoom/rooms', [ResidentAssignedRoomController::class, 'showRessAssRoom'])->name('rar.rooms');

    Route::apiResource('medicines', medicineController::class);
    Route::POST('medicines/edit{medicine}', [medicineController::class, 'edit'])->name('medicines.edit');
    Route::POST('medicines/updateMeds{medicine}', [medicineController::class, 'updateMeds'])->name('medicines.updateMeds');

    Route::apiResource('patientMedicines', PatientMedicineController::class);

    Route::apiResource('results', LabResultsController::class);
    
    Route::apiResource('patientHealthRecord', PatientHealthRecordController::class);
    Route::post('patientHealthRecord/transferPatient/{patient_id}', [PatientHealthRecordController::class, 'transferPatient'])->name('phr.transferPatient');
    Route::get('patientHealthRecord/get/AvailableRooms', [PatientHealthRecordController::class, 'getAvailableRooms'])->name('phr.getAvailableRooms');
    Route::get('patientHealthRecord/checkoutPatient/{patient_id}', [PatientHealthRecordController::class, 'checkoutPatient'])->name('phr.checkoutPatient');
    Route::get('patientHealthRecord/getPatientbyRoom/{room_id}', [PatientHealthRecordController::class, 'getPatientbyRoom'])->name('phr.getPatientbyRoom');

    
    Route::apiResource('physicalExams', PhysicalExamController::class);



    Route::apiResource('residents', ResidentController::class);
    Route::POST('residents/edit{resident}', [residentController::class, 'edit'])->name('residents.edit');
    Route::POST('residents/updateResident{resident}', [residentController::class, 'updateResident'])->name('residents.updateResident');


    Route::apiResource('vitals', VitalController::class);
    Route::POST('vitals/edit{vital}', [vitalController::class, 'edit'])->name('vitals.edit');
    Route::POST('vitals/updateVital{vital}', [vitalController::class, 'updateVital'])->name('vitals.updateVital');
  

    Route::apiResource('rooms', RoomController::class);
    Route::POST('Rooms/getRooms{roomId}', [roomController::class, 'getRoom'])->name('rooms.getRoom');
    Route::post('Rooms/getRoomsByfloor/{floor_id}', [RoomController::class, 'getRoomByFloor'])->name('room.getRoomByFloor');


    Route::apiResource('departments', DepartmentController::class);
    Route::POST('departments/edit{department}', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::POST('departments/updateDep{department}', [DepartmentController::class, 'updateDep'])->name('departments.updateDep');


    Route::apiResource('floors', FloorController::class);
    Route::POST('floors/edit{floor}', [floorController::class, 'edit'])->name('floors.edit');
    Route::POST('floors/updateFloor{floor}', [floorController::class, 'updateFloor'])->name('floors.updateFloor');

});



