<?php


use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return route('fileUploadWeb.index');
})->name('login');

Route::resource('fileUploadWeb', FileUploadController::class);
Route::get('fileUploadWeb/viewFile/{file_id}', [FileUploadController::class, 'viewFile'])->name('fileUploadWeb.viewFile');

