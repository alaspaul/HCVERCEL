<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ResidentAssignedRoomController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\MedecineController;
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
