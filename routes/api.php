<?php




use App\Http\Controllers\ChatGroupController;
use App\Http\Controllers\ChatGroupMessagesController;
use App\Http\Controllers\ChatGroupUsersController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LabResultsController;
use App\Http\Controllers\PatAssRoomController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientMedicineController;
use App\Http\Controllers\PhrAttributeValuesController;
use App\Http\Controllers\PhrCategoryAttributesController;
use App\Http\Controllers\PhrFormCategoriesController;
use App\Http\Controllers\PhysicalExamAttributesController;
use App\Http\Controllers\PhysicalExamCategoriesController;
use App\Http\Controllers\PhysicalExamValuesController;
use App\Http\Controllers\ResActionLogController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ResidentAssignedRoomController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\loginController;
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


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:adminApi'], function () {
    Route::get('Check', [UserController::class, 'checker'])->name('checker');
    Route::get('Logout', [UserController::class, 'logoutAdmin'])->name('logout');
    Route::apiResource('admin', UserController::class);



    Route::apiResource('resActLog', ResActionLogController::class);
    Route::get('resActLog/residentName/{resident_id}', [ResActionLogController::class, 'residentName'])->name('RAL.residentName');
    Route::get('resActLog/logs/department', [ResActionLogController::class, 'logsByDep'])->name('RAL.logsByDep');



    Route::apiResource('residents', ResidentController::class);
    Route::POST('residents/edit{resident}', [ResidentController::class, 'edit'])->name('residents.edit');
    Route::POST('residents/updateResident{resident}', [ResidentController::class, 'updateResident'])->name('residents.updateResident');


    Route::apiResource('floors', FloorController::class);
    Route::POST('floors/edit{floor}', [FloorController::class, 'edit'])->name('floors.edit');
    Route::PUT('floors/updateFloor/{floor}', [FloorController::class, 'updateFloor'])->name('floors.updateFloor');


    Route::apiResource('departments', DepartmentController::class);
    Route::POST('departments/getDepNamebyId/{department_id}', [DepartmentController::class, 'getDepNamebyId'])->name('departments.getDepNamebyId');
  
    Route::apiResource('medicines', MedicineController::class);
    Route::POST('medicines/edit{medicine}', [MedicineController::class, 'edit'])->name('medicines.edit');
    Route::POST('medicines/updateMeds{medicine}', [MedicineController::class, 'updateMeds'])->name('medicines.updateMeds');


    Route::apiResource('rooms', RoomController::class);
    Route::POST('rooms/edit{room}', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::PUT('rooms/updateRoom/{roomId}', [RoomController::class, 'updateRoom'])->name('rooms.updateRoom');
    Route::GET('rooms/getRooms{roomId}', [RoomController::class, 'getRoom'])->name('rooms.getRoom');
    Route::GET('rooms/getRoomsByfloor/{floor_id}', [RoomController::class, 'getRoomByFloor'])->name('room.getRoomByFloor');

    Route::apiResource('patients', PatientController::class);
    Route::get('patients/getPatientName/{id}', [PatientController::class, 'getPatientName'])->name('patients.getPatientName');
    Route::get('patients/getPatientbyId/{id}', [PatientController::class, 'getPatientbyId'])->name('patients.getPatientbyId');
});




Route::post('/login', [loginController::class, 'loginResident'])->name('loginRes');


Route::group(['middleware' => 'auth:customApi'], function () {
    Route::get('/logout', [loginController::class, 'logoutRes'])->name('logout');


    Route::apiResource('rooms', RoomController::class);
    Route::POST('rooms/edit{room}', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::POST('rooms/updateRoom{room}', [RoomController::class, 'updateRoom'])->name('rooms.updateRoom');
    Route::POST('rooms/getRooms{roomId}', [RoomController::class, 'getRoom'])->name('rooms.getRoom');
    Route::post('rooms/getRoomsByfloor/{floor_id}', [RoomController::class, 'getRoomByFloor'])->name('room.getRoomByFloor');

    
    Route::apiResource('fileUpload', FileUploadController::class);
    Route::GET('fileUpload/download/{file_id}', [FileUploadController::class, 'download'])->name('fileUpload.download');
    Route::post('fileUpload/getFiles', [FileUploadController::class, 'getFiles'])->name('fileUpload.getFiles');
    Route::get('fileUpload/getFilesByPatient/{patient_id}', [FileUploadController::class, 'getFilesByPatient'])
    ->name('fileUpload.getFilesByPatient');

    Route::apiResource('resActLog', ResActionLogController::class);
    Route::get('resActLog/residentName/{resident_id}', [ResActionLogController::class, 'residentName'])->name('RAL.residentName');
    Route::get('resActLog/logs/department', [ResActionLogController::class, 'logsByDep'])->name('RAL.logsByDep');



    Route::apiResource('resAssRooms', ResidentAssignedRoomController::class);
    Route::GET('resAssRooms/rooms/{resident_id}', [ResidentAssignedRoomController::class, 'showRessAssRoom'])->name('rar.rooms');
    Route::GET('resAssRooms/resident/{resident_id}', [ResidentAssignedRoomController::class, 'residentName'])->name('rar.residentName');
    Route::GET('resAssRooms/roomName/{room_id}', [ResidentAssignedRoomController::class, 'roomName'])->name('rar.roomName');
Route::GET('resAssRooms/residentsByDepartment/{department_id}', [ResidentAssignedRoomController::class, 'getResidentsByDepartment'])->name('rar.residentsByDepartment');
Route::GET('resAssRooms/get/unassignedRooms', [ResidentAssignedRoomController::class, 'unassignedRooms'])->name('rar.unassignedRooms');
Route::get('/resident-assigned-rooms', [ResidentAssignedRoomController:: class, 'getCurrentUserAssignedRooms']);
Route::put('/resAssRooms/{id}/updateIsFinished', [ResidentAssignedRoomController::class, 'updateIsFinished'])->name('rar.updateIsFinished');


    Route::apiResource('medicines', MedicineController::class);
    Route::POST('medicines/edit{medicine}', [MedicineController::class, 'edit'])->name('medicines.edit');
    Route::POST('medicines/updateMeds{medicine}', [MedicineController::class, 'updateMeds'])->name('medicines.updateMeds');

    Route::apiResource('patientMedicines', PatientMedicineController::class);
    Route::get('patientMedicines/patient/{patient_id}', [PatientMedicineController::class, 'getPatientMedicinesByPatientId']);

    Route::apiResource('results', LabResultsController::class);


    Route::apiResource('residents', ResidentController::class);
    Route::POST('residents/edit{resident}', [ResidentController::class, 'edit'])->name('residents.edit');
    Route::POST('residents/updateResident{resident}', [ResidentController::class, 'updateResident'])->name('residents.updateResident');
    Route::get('resident/{resident_id}', 'ResidentController@residentName');
    Route::GET('residents/get/allRes', [residentController::class, 'allRes'])->name('residents.allRes');



    Route::apiResource('vitals', VitalController::class);
    Route::POST('vitals/edit{vital}', [VitalController::class, 'edit'])->name('vitals.edit');
    Route::POST('vitals/updateVital{vital}', [VitalController::class, 'updateVital'])->name('vitals.updateVital');


    Route::apiResource('rooms', RoomController::class);
    Route::get('rooms/getRooms{roomId}', [RoomController::class, 'getRoom'])->name('rooms.getRoom');
    Route::get('rooms/getRoomsByfloor/{floor_id}', [RoomController::class, 'getRoomByFloor'])->name('room.getRoomByFloor');

    Route::apiResource('departments', DepartmentController::class);
    Route::get('departments/getDepNamebyId/{department_id}', [DepartmentController::class, 'getDepNamebyId'])->name('departments.getDepNamebyId');
  

    Route::apiResource('floors', FloorController::class);
    Route::POST('floors/edit{floor}', [FloorController::class, 'edit'])->name('floors.edit');
    Route::POST('floors/updateFloor{floor}', [FloorController::class, 'updateFloor'])->name('floors.updateFloor');

    Route::apiResource('patients', PatientController::class);
    Route::get('patients/getPatientName/{id}', [PatientController::class, 'getPatientName'])->name('patients.getPatientName');
    Route::get('patients/getPatientbyId/{id}', [PatientController::class, 'getPatientbyId'])->name('patients.getPatientbyId');
    Route::get('patients/getPatientRoom/{id}', [PatientController::class, 'getPatientRoom'])->name('patients.getPatientRoom');
    Route::post('patients/addPhr/{id}', [PatientController::class, 'addPhr'])->name('patients.addPhr');
    Route::put('patients/{patient_id}', [PatientController::class, 'update']);


    Route::apiResource('formCategories', PhrFormCategoriesController::class);

    Route::apiResource('categoryAttributes', PhrCategoryAttributesController::class);
    Route::get('categoryAttributes/getAttributeName/{id}', [PhrCategoryAttributesController::class, 'getAttributeName'])->name('categoryAttributes.getAttributeName');

    Route::apiResource('attributeValues', PhrAttributeValuesController::class);
    Route::get('attributeValues/getPHR/{patient_id}', [PhrAttributeValuesController::class, 'getPHR'])->name('attributeValues.getPHR');
    Route::get('attributeValues/getAttributeName/{id}', [PhrAttributeValuesController::class, 'getAttributeName'])->name('attributeValues.getAttributeName');
    Route::get('attributeValues/getPhrDates/{patient_id}', [PhrAttributeValuesController::class, 'getPhrDates'])->name('attributeValues.getPhrDates');
    Route::get('attributeValues/getPhrbyDate/{patient_id}', [PhrAttributeValuesController::class, 'getPhrbyDate'])->name('attributeValues.getPhrbyDate');
    Route::get('attributeValues/comparePhr/{patient_id}', [PhrAttributeValuesController::class, 'comparePhr'])->name('attributeValues.comparePhr');
    Route::get('attributeValues/getPHRM/{patient_id}', [PhrAttributeValuesController::class, 'getPHRM'])->name('attributeValues.getPHRM');


    Route::get('attributeValues/getFormCategoryName/{formCat_id}', [PhrAttributeValuesController::class, 'getFormCategoryName'])
    ->name('attributeValues.getFormCategoryName');


    Route::apiResource('patAssRooms', PatAssRoomController::class);
    Route::post('patAssRooms/transferPatient/{patient_id}', [PatAssRoomController::class, 'transferPatient'])->name('patAssRooms.transferPatient');
    Route::get('patAssRooms/get/AvailableRooms', [PatAssRoomController::class, 'getAvailableRooms'])->name('patAssRooms.getAvailableRooms');
    Route::get('patAssRooms/getPatientbyRoom/{room_id}', [PatAssRoomController::class, 'getPatientbyRoom'])->name('patAssRooms.getPatientbyRoom');
    Route::get('patAssRooms/checkout/{patient_id}', [PatAssRoomController::class, 'checkout'])->name('patAssRooms.checkout');
    Route::get('patAssRooms/getPatient/{patient_id}', [PatAssRoomController::class, 'getPatient'])->name('patAssRooms.getPatient');
    Route::get('patAssRooms/getRoombyPatient/{patient_id}', [PatAssRoomController::class, 'getRoombyPatient'])->name('patAssRooms.getRoombyPatient');
    Route::get('patAssRooms/get/unassignedRooms', [PatAssRoomController::class, 'unassignedRooms'])->name('patAssRooms.unassignedRooms');


    Route::apiResource('physicalExam/categories', PhysicalExamCategoriesController::class);
    
    Route::apiResource('physicalExam/attributes', PhysicalExamAttributesController::class);

    Route::apiResource('physicalExam/values', PhysicalExamValuesController::class);
    Route::get('physicalExam/values/getPE/{patient_id}', [PhysicalExamValuesController::class, 'getPE'])->name('physicalExamValues.getPE');
    Route::get('physicalExam/values/getPEM/{patient_id}', [PhysicalExamValuesController::class, 'getPEM'])->name('physicalExamValues.getPEM');


    Route::apiResource('chatGroup', ChatGroupController::class);

    
    Route::apiResource('chatGroupMessages', ChatGroupMessagesController::class);
    Route::get('chatGroupMessages/get/GroupMessages/{chatGroup_id}', [ChatGroupMessagesController::class, 'getGroupMessages'])->name('chatGroupMessages.GroupMessages');

    
    Route::apiResource('chatGroupUsers', ChatGroupUsersController::class);
    Route::get('chatGroupUsers/get/allGroups', [ChatGroupUsersController::class, 'allGroups'])->name('chatGroupUsers.allGroups');
    Route::get('chatGroupUsers/get/allUsersinGroup/{chatGroup_id}', [ChatGroupUsersController::class, 'allUsersinGroup'])->name('chatGroupUsers.allUsersinGroup');
    Route::get('chatGroupUsers/{residentId}', [ChatGroupUsersController::class, 'getChatGroupsByResidentId']);
    Route::get('chatGroupUsers/get/addResidents', [ChatGroupUsersController::class, 'addResidents'])->name('chatGroupUsers.addResidents');
    Route::get('chatGroupUsers/get/firstAddResidents', [ChatGroupUsersController::class, 'firstAddResidents'])->name('chatGroupUsers.firstAddResidents');

    Route::apiResource('histories', HistoryController::class);
    
});

Route::get('fileUpload/viewFile/{file_id}', [FileUploadController::class, 'viewFile'])->name('fileUpload.viewFile');
