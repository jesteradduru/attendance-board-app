<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ColumnController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SettingIndexController;
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

Route::prefix('settings')
->name('settings.')
->group(function () {
    Route::name('index')->get('/', [SettingIndexController::class, 'index']);
    Route::resource('column', ColumnController::class)->only(['create', 'store', 'destroy']);
    Route::resource('employee', EmployeeController::class)->only(['create', 'store']);
});
