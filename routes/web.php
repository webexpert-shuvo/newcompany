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
        Route::get('/post-status/{id}' , [App\Http\Controllers\PostController::class ,'postStatus'])->name('show.poststatus');
        Route::get('/post-edit/{id}' , [App\Http\Controllers\PostController::class ,'postEdit'])->name('show.postedit');
        Route::get('/post-delete/{id}' , [App\Http\Controllers\PostController::class ,'postDelete'])->name('show.postdelete');


        //Product Category

        Route::get('/product-category' , [App\Http\Controllers\ProCategoryController::class, 'Index']  )->name('show.product.category');
        Route::post('/product-category' , [App\Http\Controllers\ProCategoryController::class, 'proCateAdd']  )->name('show.product.category.store');


        //Product Tag
        Route::get('/product-tag' , [App\Http\Controllers\ProTagController::class, 'Index'])->name('show.pro.tag');
        Route::post('/product-tag' , [App\Http\Controllers\ProTagController::class, 'proTagStore'])->name('show.pro.tag.store');
        Route::get('/product-tag-delete/{id}' , [App\Http\Controllers\ProTagController::class, 'proTagDelete'])->name('show.pro.tag.delete');
        Route::get('/product-tag-edit/{id}' , [App\Http\Controllers\ProTagController::class, 'proTagEdit'])->name('show.pro.tag.edit');
        Route::post('/product-tag-update/{id}' , [App\Http\Controllers\ProTagController::class, 'proTagUpdate'])->name('show.pro.tag.update');


    });



    //Front End Route

    Route::get('/home' , [App\Http\Controllers\CompanyController::class , 'Index'])->name('show.home.company');
    Route::get('/blog' , [App\Http\Controllers\BlogController::class , 'Index'])->name('show.blog.company');
    Route::get('/blog/{slug}' , [App\Http\Controllers\BlogController::class , 'singlePost'])->name('show.blog.single');
    Route::post('/blog/search' , [App\Http\Controllers\BlogController::class , 'postSearch'])->name('show.blog.search');
    Route::post('/blog/comment' , [App\Http\Controllers\CommentController::class , 'postComment'])->name('show.blog.comment');
    Route::get('post/category/{slug}' , [App\Http\Controllers\BlogController::class , 'categoryPostSearch'])->name('blog.category.search');

