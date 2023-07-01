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
Route::get('/profile', [ProfileController::class, 'index']); //done
Route::get('/edit-profile', [ProfileController::class, 'update']); //done

//Login
Route::get('/login', [LoginController::class, 'index'])->name('account.login'); //done
Route::get('/login/forgot-pw', [LoginController::class, 'forgotPw']); //done
Route::get('/login/forgot-pw-next', [LoginController::class, 'forgotPwNext']); //done
Route::post('/login', [LoginController::class, 'authenticate']); //done

//Register
Route::get('/register', [RegistController::class, 'index']); //done
Route::get('/register/role', [RegistController::class, 'addRoleView']); //done
Route::post('/register/role', [RegistController::class, 'role']); //done
Route::post('/register/regist', [RegistController::class, 'addRole']); //done


//Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin'); //done
Route::get('/admin/add-mitra', [AdminController::class, 'create'])->name('admin.add-mitra'); //done
Route::get('/admin/detail-mitra/{seller:id}', [AdminController::class, 'show'])->name('admin.detail-mitra'); //need revisi-database
Route::get('/admin/detail-mitra/{seller:id}/edit', [AdminController::class, 'edit'])->name('admin.edit-mitra'); //done
Route::get('/admin/search-mitra', [AdminController::class, 'search'])->name('admin.search-mitra'); //need revisi-database
Route::get('/admin/revenue-mitra', [AdminController::class, 'totalRevenue'])->name('admin.revenue'); //need revisi-database

Route::post('/admin/add-mitra', [AdminController::class, 'store'])->name('admin.add-mitra-process'); //done
Route::post('/admin/detail-mitra/{seller:id}/edit', [AdminController::class, 'update'])->name('admin.update-mitra'); //done
Route::post('/admin', [AdminController::class, 'destroy'])->name('admin.delete-mitra'); //done


//Seller
Route::get('/seller', [SellerController::class, 'index'])->name('seller');//need revisi tampilan navbar, logo di navbar, nyambungin di tiap navbar ke halaman2 seller
Route::get('/seller/add-product', [SellerController::class, 'create']);//need revisi tampilan navbar, logo di navbar, nyambungin di tiap navbar ke halaman2 seller
Route::get('/seller/edit-product', [SellerController::class, 'edit']);//need revisi tampilan navbar, nyambungin di tiap navbar ke halaman2 seller
Route::get('/seller/revenue', [SellerController::class, 'getRevenue']);//need revisi database

//Buyer
Route::get('/payment', [TransactionController::class, 'index'])->name('buyer.payment');

//Product
Route::get('/buyer', [ProductController::class, 'index'])->name('buyer');//need revisi besar teks navbar, besar logo
Route::get('/buyer/product', [ProductController::class, 'show']);//need revisi fungsional
Route::get('/buyer/cart', [ProductController::class, 'edit'])->name('buyer.cart'); //need revisi fungsional
