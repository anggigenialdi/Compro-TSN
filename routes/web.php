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

Route::get('/admin_dashboard', 'Admin\DashboardController@index')->middleware('role:admin');
Route::get('/users_dashboard', 'Users\DashboardController@index')->middleware('role:basic');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('admin', function () {
//         return 'admin page';
//     });
// });
