<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
    return view('/layouts/app');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('home', HomeController::class);

//Route::get('get/{file_name}', [HomeController::class, 'downloadFile'])->name("downloadFile");
Route::get('get/{file_name}', [HomeController::class, 'downloadFile'])->name('downloadFile');
