<?php

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
Route::prefix('/')->middleware('site')->group(function () {
    Route::get('/', [App\Http\Controllers\Site\HomeController::class, 'index'])->name('home');
    Route::get('news/{slug}', [App\Http\Controllers\Site\NewsController::class, 'show'])->name('category.detail');
    Route::get('/c-{slug}', [App\Http\Controllers\Site\CategoryController::class, 'show'])->name('category.index');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');

Route::get('/admin/login', 'Admin\LoginController@index')->name('admin.login');
Route::post('/admin/login', 'Admin\LoginController@authenticate')->name('admin.authenticate');
Route::prefix('admin')->middleware('admin')->namespace('Admin')->group(function () {
    Route::get('/news/get-all', 'NewsController@getAll')->name('news.getAll');
    Route::post('/news/{id}', 'NewsController@update');
    Route::resource('news', NewsController::class);
});
