<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

//profile
Route::get('/edit-profile', [ProfileController::class, 'update']);
Route::get('/profile', [ProfileController::class, 'index']);

//Login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

//Register
Route::get('/register', [RegistController::class, 'index']);
Route::get('/register/role', [RegistController::class, 'role']);
Route::post('/register', [RegistController::class, 'store']);
Route::post('/register/role', [RegistController::class, 'addRole']);

//Admin
Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/detail-mitra/{id?}', [AdminController::class, 'edit']);

//Seller
Route::get('/seller', [SellerController::class, 'index']);

//User

//Product
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/detail-product', [ProductController::class, 'show']);