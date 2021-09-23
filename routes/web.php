<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('adminlogin');
});
Route::get('/abcd', function () {
    $json = Storage::disk('local')->get('admin.json');
    $jsone = json_decode($json, true);
    dd($jsone);
});
Route::post('/login', [LoginController::class, 'login']);
Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/employees/crate', [EmployeeController::class, 'create']);
Route::post('/employees',[EmployeeController::class,'store']);
Route::get('/employees/{id}/edit',[EmployeeController::class,'edit']);
Route::put('/employees/{id}',[EmployeeController::class,'update']);
Route::get('/employees/{id}/delete',[EmployeeController::class,'destroy']);
