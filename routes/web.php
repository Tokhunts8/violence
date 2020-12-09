<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Route::get('/admin', function () {
    return redirect('admin/section');
});

Route::group(['prefix' => 'admin', 'middleware' => [\App\Http\Middleware\Authenticate::class]], function () {
    Route::resource('section', \App\Http\Controllers\SectionController::class);
    Route::resource('file', \App\Http\Controllers\FileController::class);
    Route::resource('chart', \App\Http\Controllers\ChartController::class);
});

Auth::routes();

// armenian

Route::get('/', array(function(){
    return App::make(\App\Http\Controllers\MainController::class)->index('am', 'index');
}));

Route::get('/domestic', array(function(){
    return App::make(\App\Http\Controllers\MainController::class)->index('am', 'domestic');
}));

Route::get('/statistics', array(function(){
    return App::make(\App\Http\Controllers\MainController::class)->index('am', 'statistics');
}));

Route::get('/your-rights', array(function(){
    return App::make(\App\Http\Controllers\MainController::class)->index('am', 'your-rights');
}));


// english

Route::get('/en', array(function(){
    return App::make(\App\Http\Controllers\MainController::class)->index('en', 'index');
}));

Route::get('/en/domestic', array(function(){
    return App::make(\App\Http\Controllers\MainController::class)->index('en', 'domestic');
}));

Route::get('/en/statistics', array(function(){
    return App::make(\App\Http\Controllers\MainController::class)->index('en', 'statistics');
}));

Route::get('/en/your-rights', array(function(){
    return App::make(\App\Http\Controllers\MainController::class)->index('en', 'your-rights');
}));


