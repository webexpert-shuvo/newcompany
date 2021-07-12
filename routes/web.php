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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

    //Backend  Routes

    Route::get('/admin-login' , [App\Http\Controllers\BackendController::class , 'adminLogin'])->name('show.loginpage');
    Route::get('/admin-register' , [App\Http\Controllers\BackendController::class , 'adminRegister'])->name('show.registerpage');
    Route::get('/admin-panel' , [App\Http\Controllers\BackendController::class , 'adminPanel'])->name('show.panelpage');



