<?php




use Illuminate\Support\Facades\Route;

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







Route::post('/login', [loginController::class, 'loginResident'])->name('loginRes');
Route::apiResource('residents', ResidentController::class);


Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::get('/logout', [loginController::class, 'logoutRes'])->name('logout');

    
Route::apiResource('ResAssRooms', ResidentAssignedRoomController::class);
Route::apiResource('departments', DepartmentController::class);

Route::apiResource('floors', FloorController::class);
Route::apiResource('medicines', medicineController::class);



Route::apiResource('PatientHealthRecord', PatientHealthRecordController::class);
Route::apiResource('PhysicalExams', PhysicalExamController::class);

Route::apiResource('Vitals', VitalController::class);
Route::apiResource('Rooms', RoomController::class);


Route::post('Rooms/getRoomsByfloor/{floor_id}', [RoomController::class, 'getRoomByFloor'])->name('room.getRoomByFloor');


Route::get('showResAssRoom/{resident_id}', [ResidentAssignedRoomController::class, 'show']);


Route::GET('resAssRoom/rooms', [ResidentAssignedRoomController::class, 'showRessAssRoom'])->name('rar.rooms');

Route::POST('departments/edit{department}', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::POST('departments/updateDep{department}', [DepartmentController::class, 'updateDep'])->name('departments.updateDep');

Route::POST('floors/edit{floor}', [floorController::class, 'edit'])->name('floors.edit');
Route::POST('floors/updateFloor{floor}', [floorController::class, 'updateFloor'])->name('floors.updateFloor');

Route::POST('medicines/edit{medicine}', [medicineController::class, 'edit'])->name('medicines.edit');
Route::POST('medicines/updateMeds{medicine}', [medicineController::class, 'updateMeds'])->name('medicines.updateMeds');


Route::POST('residents/edit{resident}', [residentController::class, 'edit'])->name('residents.edit');
Route::POST('residents/updateResident{resident}', [residentController::class, 'updateResident'])->name('residents.updateResident');

Route::POST('vitals/edit{vital}', [vitalController::class, 'edit'])->name('vitals.edit');
Route::POST('vitals/updateVital{vital}', [vitalController::class, 'updateVital'])->name('vitals.updateVital');

Route::POST('rooms/edit{room}', [roomController::class, 'edit'])->name('rooms.edit');
Route::POST('rooms/updateRoom{room}', [roomController::class, 'updateRoom'])->name('rooms.updateRoom');
Route::POST('rooms/getrooms{roomId}', [roomController::class, 'getRoom'])->name('rooms.getRoom');




});



