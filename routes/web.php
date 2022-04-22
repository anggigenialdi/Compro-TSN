<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::group(['prefix' => 'api/v1'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('role:admin');
    Route::get('/employe', [App\Http\Controllers\Employe\EmployeController::class, 'create'])->name('employe.create')->middleware('role:admin');
    Route::post('/employe', [App\Http\Controllers\Employe\EmployeController::class, 'store'])->name('employe.store')->middleware('role:admin');
});

Route::get('/users-dashboard', [App\Http\Controllers\Users\DashboardController::class, 'index'])->middleware('role:basic');
