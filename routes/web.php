<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UsersController;
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

Route::get('/', [HomeController::class,'arbitrary'])->name('main');

Route::prefix('/users')->group(function () {
    Route::post('/registration', [UsersController::class,'registration'])->name("users.registration");
    Route::post('/authorization', [UsersController::class,'authorization'])->name("users.authorization");
    Route::get('/', [UsersController::class,'show'])->name("users.show");
    Route::delete('/{id}', [UsersController::class,'destroy'])->name("users.destroy");
});

Route::resource('/tasks', TasksController::class);
Route::resource('/label', LabelController::class);
Route::resource('/status', StatusController::class);
