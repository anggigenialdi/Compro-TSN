<?php

use App\Http\Controllers\Employee\EmployeeController;
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


Route::get('/home', 'HomeController@index')->name('home')->middleware('role:admin');

$router->group(['prefix' => 'employees'], function () use ($router) {
    Route::get('/index', 'Employee\EmployeeController@employeeIndex')->name('employee.index')->middleware('role:admin');
    Route::post('/create', 'Employee\EmployeeController@store')->name('employee.store')->middleware('role:admin');
});

$router->group(['prefix' => 'master-data'], function () use ($router) {
    Route::get('/positions', 'Master\MasterDataController@indexPosition')->name('MasterPosition.indexPosition')->middleware('role:admin');
    Route::get('/category', 'Master\MasterDataController@indexCategory')->name('MasterCategory.indexCategory')->middleware('role:admin');
    Route::get('/type', 'Master\MasterDataController@indexType')->name('MasterType.indexType')->middleware('role:admin');

    Route::post('/positions/create', 'Master\MasterDataController@createPosition')->name('MasterPosition.createPosition')->middleware('role:admin');
    Route::post('/positions/{id}', 'Master\MasterDataController@updatePosition')->name('MasterPosition.updatePosition')->middleware('role:admin');

    
    Route::post('/category/create', 'Master\MasterDataController@createCategory')->name('MasterCategory.createCategory')->middleware('role:admin');
    Route::post('/category/{id}', 'Master\MasterDataController@updateCategory')->name('MasterCategory.updateCategory')->middleware('role:admin');

    Route::post('/type/create', 'Master\MasterDataController@createType')->name('MasterType.createType')->middleware('role:admin');
    Route::post('/type/{id}', 'Master\MasterDataController@updateType')->name('MasterType.updateType')->middleware('role:admin');


});

Route::get('/vacancy/job', 'VacancyController@indexJobVacancy')->name('vacancy.job');
Route::post('/vacancy/job', 'VacancyController@addJobVacancy')->name('vacancy.addjob');
Route::post('/vacancy/job/update/{id}', 'VacancyController@updateJobVacancy')->name('vacancy.updatejob');
Route::get('/vacancy/applicant', 'VacancyController@indexApplicant')->name('vacancy.applicant');

Route::get('/users-dashboard', [App\Http\Controllers\Users\DashboardController::class, 'index'])->middleware('role:basic');
