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
$router->group(['prefix' => 'api'], function () use ($router) {
    Route::post('/vacancy/add', 'VacancyController@addVacancy');
});

Route::group(['prefix' => 'api/v1'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('role:admin');

    Route::get('/employees', [App\Http\Controllers\Employee\EmployeeController::class, 'index'])->name('employee.index')->middleware('role:admin');
    Route::post('/employees/create', [App\Http\Controllers\Employee\EmployeeController::class, 'store'])->name('employee.store')->middleware('role:admin');

    Route::get('/job-positions', [App\Http\Controllers\Master\JobPosition\MasterJobPositionController::class, 'index'])->name('job_position.index')->middleware('role:admin');
    Route::post('/job-positions/create', [App\Http\Controllers\Master\JobPosition\MasterJobPositionController::class, 'create'])->name('job_position.create')->middleware('role:admin');
});
Route::get('/vacancy', 'VacancyController@index')->name('vacancy');

Route::get('/users-dashboard', [App\Http\Controllers\Users\DashboardController::class, 'index'])->middleware('role:basic');
