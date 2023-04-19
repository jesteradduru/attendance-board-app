<?php

use App\Http\Controllers\AttendanceDestinationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ColumnController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SettingIndexController;
use App\Http\Controllers\EmployeePictureController;
use App\Http\Controllers\EmployeeAttendanceController;
use App\Models\EmployeeAttendanceDestination;

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

Route::name('index')->get('/', [IndexController::class, 'index']);

// user authentication
Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::prefix('settings')
->name('settings.')
->middleware('auth')
->group(function () {
    Route::name('index')->get('/', [SettingIndexController::class, 'index']);
    Route::resource('column', ColumnController::class)->only(['create', 'store', 'destroy', 'show', 'edit', 'update']);
    Route::resource('employee', EmployeeController::class)->only(['create', 'store', 'destroy', 'edit']);
    Route::name('employee.update')->post('employee/{employee}/update', [EmployeeController::class, 'update']);
    
    Route::name('destination.create')->get('destination/{attendance}/create', [AttendanceDestinationController::class, 'create']);
    Route::name('destination.store')->post('destination/{attendance}/store', [AttendanceDestinationController::class, 'store']);
    Route::resource('destination', AttendanceDestinationController::class)->only(['edit', 'update', 'destroy']);

    Route::name('attendance.store')->post('attendance/{employee}/{column}/store', [EmployeeAttendanceController::class, 'store']);
    Route::name('attendance.update')->patch('attendance/{attendance}/{column}update', [EmployeeAttendanceController::class, 'update']);
    Route::resource('attendance', EmployeeAttendanceController::class)->only(['destroy']);
});
