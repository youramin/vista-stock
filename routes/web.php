<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategorySupplierController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/users/users', UserController::class)->middleware(['auth','user_access']);
Route::resource('/dashboard/categories', CategoryController::class)->middleware(['auth','user_access']);
Route::resource('/dashboard/products', ProductController::class)->middleware(['auth','user_access']);
Route::resource('/dashboard/categorysuppliers', CategorySupplierController::class)->middleware(['auth','user_access']);

Route::get('/', function () {
    return view('index',[
        'title' => 'Welcome'
    ]);   
});
