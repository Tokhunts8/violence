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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return redirect('admin/section');
});

Route::group(['prefix' => 'admin', 'middleware' => [\App\Http\Middleware\Authenticate::class]], function () {
    Route::resource('section', \App\Http\Controllers\SectionController::class);
    Route::resource('file', \App\Http\Controllers\FileController::class);
    Route::resource('contact', \App\Http\Controllers\ContactController::class);
});
