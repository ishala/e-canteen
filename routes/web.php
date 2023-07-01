<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Models\Product;

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
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/edit-profile', [ProfileController::class, 'update']);

//Login
Route::get('/login', [LoginController::class, 'index'])->name('account.login');
Route::get('/login/forgot-pw', [LoginController::class, 'forgotPw']);
Route::get('/login/forgot-pw-next', [LoginController::class, 'forgotPwNext']);
Route::post('/login', [LoginController::class, 'authenticate']);

//Register
Route::get('/register', [RegistController::class, 'index']);
Route::get('/register/role', [RegistController::class, 'addRoleView']);
Route::post('/register/role', [RegistController::class, 'role']);
Route::post('/register/regist', [RegistController::class, 'addRole']);


//Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/add-mitra', [AdminController::class, 'create'])->name('admin.add-mitra');
Route::get('/admin/detail-mitra/{seller:id}', [AdminController::class, 'show'])->name('admin.detail-mitra');
Route::get('/admin/detail-mitra/{seller:id}/edit', [AdminController::class, 'edit'])->name('admin.edit-mitra');
Route::get('/admin/search-mitra', [AdminController::class, 'search'])->name('admin.search-mitra');
Route::get('/admin/revenue-mitra', [AdminController::class, 'totalRevenue'])->name('admin.revenue');

Route::post('/admin/add-mitra', [AdminController::class, 'store'])->name('admin.add-mitra-process');
Route::post('/admin/detail-mitra/{seller:id}/edit', [AdminController::class, 'update'])->name('admin.update-mitra');
Route::post('/admin', [AdminController::class, 'destroy'])->name('admin.delete-mitra');


//Seller
Route::get('/seller', [SellerController::class, 'index'])->name('seller');
Route::get('/seller/add-product', [SellerController::class, 'create']);
Route::get('/seller/edit-product', [SellerController::class, 'edit']);
Route::get('/seller/revenue', [SellerController::class, 'getRevenue']);

//Buyer
Route::get('/payment', [TransactionController::class, 'index'])->name('buyer.payment');

//Product
Route::get('/buyer', [ProductController::class, 'index'])->name('buyer');
Route::get('/buyer/product', [ProductController::class, 'show']);
Route::get('/buyer/cart', [ProductController::class, 'edit'])->name('buyer.cart');