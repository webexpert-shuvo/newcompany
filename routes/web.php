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


    Route::group(['middleware' => 'auth'] , function(){

        Route::get('/admin-panel' , [App\Http\Controllers\BackendController::class , 'adminPanel'])->name('show.panelpage');

        //Category Route
        Route::get('/category', [App\Http\Controllers\CategoryController::class , 'Index'])->name('show.categorypage');
        Route::post('/category', [App\Http\Controllers\CategoryController::class , 'categoryStore'])->name('show.categorystore');
        Route::get('/category-all', [App\Http\Controllers\CategoryController::class , 'categoryAll'])->name('show.categoryall');
        Route::get('/category-status/{id}', [App\Http\Controllers\CategoryController::class , 'categoryStatus'])->name('show.categorystatus');
        Route::get('/category-edit/{id}', [App\Http\Controllers\CategoryController::class , 'categoryEdit'])->name('show.categoryedit');
        Route::post('/category-edit/{id}', [App\Http\Controllers\CategoryController::class , 'categoryUpdate'])->name('show.categoryupdate');
        Route::get('/category-delete/{id}', [App\Http\Controllers\CategoryController::class , 'categoryDelete'])->name('show.categorydelete');

         //Tag Route
         Route::get('/tag', [App\Http\Controllers\TagController::class , 'Index'])->name('show.tagpage');
         Route::post('/tag', [App\Http\Controllers\TagController::class , 'tagStore'])->name('show.tagstore');
         Route::post('/tag', [App\Http\Controllers\TagController::class , 'tagStore'])->name('show.tagstore');
         Route::get('/tag-all', [App\Http\Controllers\TagController::class , 'tagAll'])->name('show.tagall');
         Route::get('/tag-status/{id}', [App\Http\Controllers\TagController::class , 'tagStatus'])->name('show.tagstatus');
         Route::get('/tag-edit/{id}', [App\Http\Controllers\TagController::class , 'tagEdit'])->name('show.tagedit');
         Route::post('/tag-edit/{id}', [App\Http\Controllers\TagController::class , 'tagUpdate'])->name('show.tagupdate');
         Route::get('/tag-delete/{id}', [App\Http\Controllers\TagController::class , 'tagDelete'])->name('show.tagdelete');

         //Post
        Route::get('/post' , [App\Http\Controllers\PostController::class ,'Index'])->name('show.postpage');
        Route::get('/post-create' , [App\Http\Controllers\PostController::class ,'postAdd'])->name('show.postadd');
        Route::post('/post-create' , [App\Http\Controllers\PostController::class ,'postStore'])->name('show.poststore');




    });



