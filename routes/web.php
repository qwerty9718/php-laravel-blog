<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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


Route::group(['namespace' => '\App\Http\Controllers', 'prefix' =>LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {


    Route::group(['prefix' => '/'], function (){
        Route::get('/', [IndexController::class,'index'])->name('index');
        Route::get('/about', [IndexController::class,'about'])->name('about');
        Route::get('/contact', [IndexController::class,'contact'])->name('contact');
        Route::post('/sendMail', [IndexController::class,'sendMail'])->name('sendMail');


        //   BLOG
        Route::group(['namespace' => 'Main\Blog','prefix' => 'blog'], function () {
            Route::get('/{id}', 'SingleController')->name('blog.single');
            Route::post('/saveComment', 'SaveCommentController')->name('blog.saveComment');
            Route::post('/post-like/{id}', 'LikeController')->name('blog.post-like');
            Route::get('/category/{id}', 'CategoryItemsController')->name('blog.category-items');
            Route::get('/tag/{id}', 'TagItemsController')->name('blog.tag-items');
        });
    });




    //   Cabinet
    Route::group(['namespace' => 'Main\Cabinet','prefix' => 'cabinet','middleware' => ['auth','verified'] ], function () {
        Route::get('/', 'IndexController')->name('cabinet.index');

        // Cabinet Crud Tag
        Route::group(['namespace' => 'Tag','prefix' => 'tag'], function () {
            Route::get('/', 'IndexController')->name('cabinet.tag.show-all');
            Route::get('/create','CreateFormController@createForm')->name('cabinet.tag.create-form');
            Route::post('/create','StoreController')->name('cabinet.tag.save');
            Route::get('/update/{id}','CreateFormController@editForm')->name('cabinet.tag.edit-form');
            Route::patch('/update/{id}','UpdateController')->name('cabinet.tag.update');
            Route::delete('/{id}', 'DeleteController')->name('cabinet.tag.delete');
        });

        // Cabinet Crud Post
        Route::group(['namespace' => 'Post','prefix' => 'post'], function () {
            Route::get('/', 'IndexController')->name('cabinet.post.show-all');
            Route::get('/show/{id}','FindOneController')->name('cabinet.post.find-one');
            Route::get('/create','CreateFormController@createForm')->name('cabinet.post.create-form');
            Route::post('/create','StoreController')->name('cabinet.post.save');
            Route::get('/update/{id}','CreateFormController@editForm')->name('cabinet.post.edit-form');
            Route::patch('/update/{id}','UpdateController')->name('cabinet.post.update');
            Route::delete('/{id}', 'DeleteController')->name('cabinet.post.delete');
        });


        // Cabinet User
        Route::group(['namespace' => 'User','prefix' => 'user'], function () {
            Route::post('/update/name', 'UpdateController@updateName')->name('cabinet.user.name');
            Route::post('/change-password', 'UpdateController@updatePassword')->name('update-password');
            Route::post('/change-image', 'UpdateController@updateUserImage')->name('update-image');
        });

    });


});


// ADMIN
Route::group(['namespace' => 'App\Http\Controllers\Admin','prefix' => 'admin','middleware' => ['enter.admin','verified']], function () {

    Route::get('/', 'IndexController')->name('admin.index');

    // Crud Post
    Route::group(['namespace' => 'Post','prefix' => 'post'], function () {
        Route::get('/', 'IndexController')->name('admin.post.show-all');
        Route::get('/show/{id}','FindOneController')->name('admin.post.find-one');
        Route::get('/create','CreateFormController@createForm')->name('admin.post.create-form');
        Route::post('/create','StoreController')->name('admin.post.save');
        Route::get('/update/{id}','CreateFormController@editForm')->name('admin.post.edit-form');
        Route::patch('/update/{id}','UpdateController')->name('admin.post.update');
        Route::delete('/{id}', 'DeleteController')->name('admin.post.delete');
    });


    // Crud Category
    Route::group(['namespace' => 'Category','prefix' => 'category'], function () {
        Route::get('/', 'IndexController')->name('admin.category.show-all');
        Route::get('/show/{id}','FindOneController')->name('admin.category.find-one');
        Route::get('/create','CreateFormController@createForm')->name('admin.category.create-form');
        Route::post('/create','StoreController')->name('admin.category.save');
        Route::get('/update/{id}','CreateFormController@editForm')->name('admin.category.edit-form');
        Route::patch('/update/{id}','UpdateController')->name('admin.category.update');
        Route::delete('/{id}', 'DeleteController')->name('admin.category.delete');
        Route::get('/showDeleted', 'ShowDeletedController@showDeleted')->name('deleted');
        Route::get('/showDeleted/{id}', 'ShowDeletedController@restore')->name('restore');
    });


    // Crud Tag
    Route::group(['namespace' => 'Tag','prefix' => 'tag'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.show-all');
        Route::get('/show/{id}','FindOneController')->name('admin.tag.find-one');
        Route::get('/create','CreateFormController@createForm')->name('admin.tag.create-form');
        Route::post('/create','StoreController')->name('admin.tag.save');
        Route::get('/update/{id}','CreateFormController@editForm')->name('admin.tag.edit-form');
        Route::patch('/update/{id}','UpdateController')->name('admin.tag.update');
        Route::delete('/{id}', 'DeleteController')->name('admin.tag.delete');

    });

});


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
