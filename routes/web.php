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
$router->group(['prefix' => 'api/v1'], function () use ($router) {
    Route::post('/vacancy/apply', 'VacancyController@applyVacancy');
    Route::get('/vacancy/active', 'VacancyController@getVacancyActive');
    Route::get('/vacancy/{id}', 'VacancyController@getVacancyActiveDetail');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('role:admin');
$router->group(['prefix' => 'employees'], function () use ($router) {
Route::get('/index', [App\Http\Controllers\Employee\EmployeeController::class, 'index'])->name('employee.index')->middleware('role:admin');
Route::post('/employees/create', [App\Http\Controllers\Employee\EmployeeController::class, 'store'])->name('employee.store')->middleware('role:admin');
});


Route::get('/job-positions', [App\Http\Controllers\JobPosition\MasterJobPositionController::class, 'index'])->name('JobPosition.index')->middleware('role:admin');
Route::post('/job-positions/create', [App\Http\Controllers\JobPosition\MasterJobPositionController::class, 'create'])->name('JobPosition.create')->middleware('role:admin');

Route::get('/vacancy/job', 'VacancyController@indexJobVacancy')->name('vacancy.job');
Route::post('/vacancy/job', 'VacancyController@addJobVacancy')->name('vacancy.addjob');
Route::post('/vacancy/job/update/{id}', 'VacancyController@updateJobVacancy')->name('vacancy.updatejob');
Route::get('/vacancy/applicant', 'VacancyController@indexApplicant')->name('vacancy.applicant');

Route::get('/users-dashboard', [App\Http\Controllers\Users\DashboardController::class, 'index'])->middleware('role:basic');
