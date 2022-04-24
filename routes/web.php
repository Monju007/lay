<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::get('/login', [AuthController::class,'login']);
Route::post('/loginstore', [AuthController::class,'loginstore']);

Route::group(['middleware' => 'checkloggedin'], function(){
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
});

Route::group(['middleware'=>'checkIfStudent'], function(){
    Route::get('/student', [AuthController::class,'student']);
});

Route::group(['middleware'=>'checkIfTeacher'], function(){
    Route::get('/teacher', [AuthController::class,'teacher']);
});

Route::get('dashboard', function(){
    return view('admin.pages.dashboard');
});

Route::get('tables', function(){
    return view('admin.pages.tables');
});

Route::get('web', function(){
    return view('website.layouts.web');
});


