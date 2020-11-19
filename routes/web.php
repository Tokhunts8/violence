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

Route::get('/main/{locale}/{view}', [\App\Http\Controllers\MainController::class, 'index']);

Auth::routes();

Route::get('/',function () {
   return redirect('/main/am/index');
});

Route::get('/admin', function () {
    return redirect('admin/section');
});

Route::group(['prefix' => 'admin', 'middleware' => [\App\Http\Middleware\Authenticate::class]], function () {
    Route::resource('section', \App\Http\Controllers\SectionController::class);
    Route::resource('file', \App\Http\Controllers\FileController::class);
    Route::resource('chart', \App\Http\Controllers\ChartController::class);
});
