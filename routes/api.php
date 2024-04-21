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
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ResidentAssignedRoomController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\VitalController;
use App\Http\Controllers\PatientHistoryController;
use Illuminate\Support\Facades\Route;



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




Route::POST('/admin/Login', [UserController::class, 'loginAdmin'])->name('admin.login');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:adminApi'], function () {
    Route::GET('Check', [UserController::class, 'checker'])->name('checker');
    Route::GET('Logout', [UserController::class, 'logoutAdmin'])->name('logout');
    Route::apiResource('admin', UserController::class);



    Route::apiResource('resActLog', ResActionLogController::class);
    Route::GET('resActLog/residentName/{resident_id}', [ResActionLogController::class, 'residentName'])->name('RAL.residentName');
    Route::GET('resActLog/logs/department', [ResActionLogController::class, 'logsByDep'])->name('RAL.logsByDep');



    Route::apiResource('residents', ResidentController::class);
    Route::PUT('residents/updateResident/{resident}', [ResidentController::class, 'update'])->name('residents.updateResident');
    Route::DELETE('residents/delete/{resident}', [ResidentController::class, 'deleteResident'])->name('residents.deleteResident');


    Route::apiResource('floors', FloorController::class);
    Route::POST('floors/edit{floor}', [FloorController::class, 'edit'])->name('floors.edit');
    Route::PUT('floors/updateFloor/{floor}', [FloorController::class, 'update'])->name('floors.updateFloor');
    Route::DELETE('floors/delete/{floor}', [FloorController::class, 'deleteFloor'])->name('floors.deleteFloor');


    Route::apiResource('departments', DepartmentController::class);
    Route::POST('departments/getDepNamebyId/{department_id}', [DepartmentController::class, 'getDepNamebyId'])->name('departments.getDepNamebyId');
    Route::DELETE('departments/delete/{department}', [DepartmentController::class, 'deleteDepartment'])->name('departments.deleteDepartment');

    Route::apiResource('medicines', MedicineController::class);
    Route::POST('medicines/updateMeds{medicine}', [MedicineController::class, 'update'])->name('medicines.updateMeds');
    Route::DELETE('medicines/delete/{medicine}', [MedicineController::class, 'deleteMedicine'])->name('medicines.deleteMedicine');

    Route::apiResource('rooms', RoomController::class);
    Route::PUT('rooms/updateRoom/{roomId}', [RoomController::class, 'update'])->name('rooms.updateRoom');
    Route::GET('rooms/getRooms{roomId}', [RoomController::class, 'getRoom'])->name('rooms.getRoom');
    Route::GET('rooms/getRoomsByfloor/{floor_id}', [RoomController::class, 'getRoomByFloor'])->name('room.getRoomByFloor');
    Route::DELETE('rooms/delete/{room}', [RoomController::class, 'deleteRoom'])->name('rooms.deleteRoom');

    Route::apiResource('patients', PatientController::class);
    Route::GET('patients/getPatientName/{id}', [PatientController::class, 'getPatientName'])->name('patients.getPatientName');
    Route::GET('patients/getPatientbyId/{id}', [PatientController::class, 'getPatientbyId'])->name('patients.getPatientbyId');
    Route::DELETE('patients/delete/{patient}', [PatientController::class, 'deletePatient'])->name('patients.deletePatient');
});




Route::post('/login', [loginController::class, 'loginResident'])->name('loginRes');


Route::group(['middleware' => 'auth:customApi'], function () {
    Route::GET('/logout', [loginController::class, 'logoutRes'])->name('logout');


    Route::apiResource('rooms', RoomController::class);
    Route::POST('rooms/updateRoom{room}', [RoomController::class, 'update'])->name('rooms.updateRoom');
    Route::GET('rooms/getRooms{roomId}', [RoomController::class, 'getRoom'])->name('rooms.getRoom');
    Route::GET('rooms/getRoomsByfloor/{floor_id}', [RoomController::class, 'getRoomByFloor'])->name('room.getRoomByFloor');
    Route::DELETE('rooms/delete/{room}', [RoomController::class, 'deleteRoom'])->name('rooms.deleteRoom');
    
    Route::apiResource('fileUpload', FileUploadController::class);
    Route::GET('fileUpload/download/{file_id}', [FileUploadController::class, 'download'])->name('fileUpload.download');
    Route::POST('fileUpload/getFiles', [FileUploadController::class, 'getFiles'])->name('fileUpload.getFiles');
    Route::GET('fileUpload/getFilesByPatient/{patient_id}', [FileUploadController::class, 'getFilesByPatient'])->name('fileUpload.getFilesByPatient');
    Route::GET('fileUpload/viewFile/{file_id}', [FileUploadController::class, 'viewFile'])->name('fileUpload.viewFile');
    Route::DELETE('fileUpload/delete/{id}', [FileUploadController::class, 'delete'])->name('fileUpload.deleteFile');

    Route::apiResource('resActLog', ResActionLogController::class);
    Route::GET('resActLog/residentName/{resident_id}', [ResActionLogController::class, 'residentName'])->name('RAL.residentName');
    Route::GET('resActLog/logs/department', [ResActionLogController::class, 'logsByDep'])->name('RAL.logsByDep');



    Route::apiResource('resAssRooms', ResidentAssignedRoomController::class);
    Route::GET('resAssRooms/rooms/{resident_id}', [ResidentAssignedRoomController::class, 'showRessAssRoom'])->name('rar.rooms');
    Route::GET('resAssRooms/resident/{resident_id}', [ResidentAssignedRoomController::class, 'residentName'])->name('rar.residentName');
    Route::GET('resAssRooms/roomName/{room_id}', [ResidentAssignedRoomController::class, 'roomName'])->name('rar.roomName');
    Route::GET('resAssRooms/residentsByDepartment/{department_id}', [ResidentAssignedRoomController::class, 'getResidentsByDepartment'])->name('rar.residentsByDepartment');
    Route::GET('resAssRooms/get/unassignedRooms', [ResidentAssignedRoomController::class, 'unassignedRooms'])->name('rar.unassignedRooms');
    Route::GET('/resident-assigned-rooms', [ResidentAssignedRoomController:: class, 'getCurrentUserAssignedRooms']);
    Route::PUT('/resAssRooms/{id}/updateIsFinished', [ResidentAssignedRoomController::class, 'updateIsFinished'])->name('rar.updateIsFinished');
    Route::DELETE('resAssRooms/delete/{id}', [ResidentAssignedRoomController::class, 'delete'])->name('rar.delete');


    Route::apiResource('medicines', MedicineController::class);
    Route::POST('medicines/updateMeds{medicine}', [MedicineController::class, 'update'])->name('medicines.updateMeds');
    Route::DELETE('medicines/delete/{medicine}', [MedicineController::class, 'deleteMedicine'])->name('medicines.deleteMedicine');

    Route::apiResource('patientMedicines', PatientMedicineController::class);
    Route::GET('patientMedicines/patient/{patient_id}', [PatientMedicineController::class, 'getPatientMedicinesByPatientId']);
    Route::DELETE('patientMedicines/delete/{patientMedicine}', [PatientMedicineController::class, 'delete'])->name('patientMedicines.delete');

    Route::apiResource('results', LabResultsController::class);
    Route::GET('results/patient/{patientId}', [LabResultsController::class, 'getPatientLabResultsById'])->name('results.getPatientLabResultsById');
    Route::DELETE('results/delete/{result}', [LabResultsController::class, 'delete'])->name('results.delete');

    Route::apiResource('residents', ResidentController::class);
    Route::PUT('residents/updateResident{resident}', [ResidentController::class, 'update'])->name('residents.updateResident');
    Route::GET('residents/get/allRes', [ResidentController::class, 'allRes'])->name('residents.allRes');
    Route::DELETE('residents/delete/{resident}', [ResidentController::class, 'deleteResident'])->name('residents.deleteResident');


    Route::apiResource('vitals', VitalController::class);
    Route::POST('vitals/edit{vital}', [VitalController::class, 'edit'])->name('vitals.edit');
    Route::POST('vitals/updateVital{vital}', [VitalController::class, 'update'])->name('vitals.updateVital');

    Route::apiResource('departments', DepartmentController::class);
    Route::GET('departments/getDepNamebyId/{department_id}', [DepartmentController::class, 'getDepNamebyId'])->name('departments.getDepNamebyId');
    Route::DELETE('departments/delete/{department}', [DepartmentController::class, 'deleteDepartment'])->name('departments.deleteDepartment');

    Route::apiResource('floors', FloorController::class);
    Route::POST('floors/edit{floor}', [FloorController::class, 'edit'])->name('floors.edit');
    Route::POST('floors/updateFloor{floor}', [FloorController::class, 'update'])->name('floors.updateFloor');
    Route::DELETE('floors/delete/{floor}', [FloorController::class, 'deleteFloor'])->name('floors.deleteFloor');

    Route::apiResource('patients', PatientController::class);
    Route::GET('patients/getPatientName/{id}', [PatientController::class, 'getPatientName'])->name('patients.getPatientName');
    Route::GET('patients/getPatientbyId/{id}', [PatientController::class, 'getPatientbyId'])->name('patients.getPatientbyId');
    Route::GET('patients/getPatientRoom/{id}', [PatientController::class, 'getPatientRoom'])->name('patients.getPatientRoom');
    Route::POST('patients/addPhr/{id}', [PatientController::class, 'addPhr'])->name('patients.addPhr');
    Route::PUT('patients/{patient_id}', [PatientController::class, 'update']);
    Route::DELETE('patients/delete/{patient}', [PatientController::class, 'deletePatient'])->name('patients.deletePatient');

    Route::apiResource('formCategories', PhrFormCategoriesController::class);

    Route::apiResource('categoryAttributes', PhrCategoryAttributesController::class);
    Route::GET('categoryAttributes/getAttributeName/{id}', [PhrCategoryAttributesController::class, 'getAttributeName'])->name('categoryAttributes.getAttributeName');

    Route::apiResource('attributeValues', PhrAttributeValuesController::class);
    Route::GET('attributeValues/getPHR/{patient_id}', [PhrAttributeValuesController::class, 'getPHR'])->name('attributeValues.getPHR');
    Route::GET('attributeValues/getAttributeName/{id}', [PhrAttributeValuesController::class, 'getAttributeName'])->name('attributeValues.getAttributeName');
    Route::GET('attributeValues/getPhrDates/{patient_id}', [PhrAttributeValuesController::class, 'getPhrDates'])->name('attributeValues.getPhrDates');
    Route::GET('attributeValues/getPhrbyDate/{patient_id}', [PhrAttributeValuesController::class, 'getPhrbyDate'])->name('attributeValues.getPhrbyDate');
    Route::GET('attributeValues/getPHRM/{patient_id}', [PhrAttributeValuesController::class, 'getPHRM'])->name('attributeValues.getPHRM');
    Route::GET('attributeValues/getFormCategoryName/{formCat_id}', [PhrAttributeValuesController::class, 'getFormCategoryName'])->name('attributeValues.getFormCategoryName');


    Route::apiResource('patAssRooms', PatAssRoomController::class);
    Route::POST('patAssRooms/transferPatient/{patient_id}', [PatAssRoomController::class, 'transferPatient'])->name('patAssRooms.transferPatient');
    Route::GET('patAssRooms/get/AvailableRooms', [PatAssRoomController::class, 'getAvailableRooms'])->name('patAssRooms.getAvailableRooms');
    Route::GET('patAssRooms/getPatientbyRoom/{room_id}', [PatAssRoomController::class, 'getPatientbyRoom'])->name('patAssRooms.getPatientbyRoom');
    Route::GET('patAssRooms/checkout/{patient_id}', [PatAssRoomController::class, 'checkout'])->name('patAssRooms.checkout');
    Route::GET('patAssRooms/getPatient/{patient_id}', [PatAssRoomController::class, 'getPatient'])->name('patAssRooms.getPatient');
    Route::GET('patAssRooms/getRoombyPatient/{patient_id}', [PatAssRoomController::class, 'getRoombyPatient'])->name('patAssRooms.getRoombyPatient');
    Route::GET('patAssRooms/get/unassignedRooms', [PatAssRoomController::class, 'unassignedRooms'])->name('patAssRooms.unassignedRooms');


    Route::apiResource('physicalExam/categories', PhysicalExamCategoriesController::class);
    
    Route::apiResource('physicalExam/attributes', PhysicalExamAttributesController::class);

    Route::apiResource('physicalExam/values', PhysicalExamValuesController::class);
    Route::GET('physicalExam/values/getPE/{patient_id}', [PhysicalExamValuesController::class, 'getPE'])->name('physicalExamValues.getPE');
    Route::GET('physicalExam/values/getPEM/{patient_id}', [PhysicalExamValuesController::class, 'getPEM'])->name('physicalExamValues.getPEM');


    Route::apiResource('chatGroup', ChatGroupController::class);

    
    Route::apiResource('chatGroupMessages', ChatGroupMessagesController::class);
    Route::GET('chatGroupMessages/get/GroupMessages/{chatGroup_id}', [ChatGroupMessagesController::class, 'getGroupMessages'])->name('chatGroupMessages.GroupMessages');

    
    Route::apiResource('chatGroupUsers', ChatGroupUsersController::class);
    Route::GET('chatGroupUsers/get/allGroups', [ChatGroupUsersController::class, 'allGroups'])->name('chatGroupUsers.allGroups');
    Route::GET('chatGroupUsers/get/allUsersinGroup/{chatGroup_id}', [ChatGroupUsersController::class, 'allUsersinGroup'])->name('chatGroupUsers.allUsersinGroup');
    Route::GET('chatGroupUsers/{residentId}', [ChatGroupUsersController::class, 'getChatGroupsByResidentId']);
    Route::GET('chatGroupUsers/get/addResidents', [ChatGroupUsersController::class, 'addResidents'])->name('chatGroupUsers.addResidents');
    Route::GET('chatGroupUsers/get/firstAddResidents', [ChatGroupUsersController::class, 'firstAddResidents'])->name('chatGroupUsers.firstAddResidents');

    Route::apiResource('histories', HistoryController::class);

    Route::apiResource('patientHistories', PatientHistoryController::class);
    Route::GET('patientHistories/get/historyByPatientId/{patient_id}', [PatientHistoryController::class, 'getPatientHistorybyPatientID'])->name('patientHistories.gethistoryByPatientId');

    
});

Route::GET('fileUpload/viewFile/{file_id}', [FileUploadController::class, 'viewFile'])->name('fileUpload.viewFile');
