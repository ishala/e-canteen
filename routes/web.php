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
Route::post('/admin/search-mitra', [AdminController::class, 'searchControl'])->name('admin.search-mitra-process'); 
Route::post('/admin/detail-mitra/{seller:id}/edit', [AdminController::class, 'update'])->name('admin.update-mitra'); 
Route::post('/admin', [AdminController::class, 'destroy'])->name('admin.delete-mitra'); 


//Seller
Route::get('/seller', [SellerController::class, 'index'])->name('seller');
Route::get('/seller/all-products', [SellerController::class, 'show'])->name('seller.all-products');
Route::get('/seller/all-products/search', [SellerController::class, 'search'])->name('seller.search-products');
Route::get('/seller/all-products/add-product', [SellerController::class, 'create'])->name('seller.add-product');
Route::get('/seller/all-products/{product:id}/edit-product', [SellerController::class, 'edit'])->name('seller.edit-product');
Route::get('/seller/revenue', [SellerController::class, 'getRevenue'])->name('seller.revenue');
Route::get('/seller/confirm-orders', [SellerController::class, 'confirmOrders'])->name('seller.confirm-orders');

Route::post('/seller/all-products', [SellerController::class, 'show'])->name('seller.all-products');
Route::post('/seller/all-products/add-product', [SellerController::class, 'store'])->name('seller.add-product');
Route::post('/seller/all-products/{product:id}/edit-product', [SellerController::class, 'update'])->name('seller.update-product');
Route::post('/seller/all-products/{product:id}/delete-product', [SellerController::class, 'destroy'])->name('seller.delete-product');
Route::post('/seller/all-products/search', [SellerController::class, 'searchProcess'])->name('seller.search-products-process');

//Buyer
Route::get('/buyer/order/{product:id}', [ProductController::class, 'show'])->name('buyer.detail-product');
Route::get('/buyer', [ProductController::class, 'index'])->name('buyer');
Route::get('/buyer/products', [ProductController::class, 'show'])->name('buyer.all-products');
Route::get('/buyer/cart', [TransactionController::class, 'show'])->name('buyer.cart'); 
Route::get('/buyer/payment', [TransactionController::class, 'index'])->name('buyer.payment');
Route::get('/buyer/products/search', [BuyerController::class, 'search'])->name('buyer.search-products');
Route::get('/buyer/products/select-table', [TransactionController::class, 'selectTable'])->name('buyer.select-table');
Route::get('/buyer/products/confirm-orders', [TransactionController::class, 'confirmOrders'])->name('buyer.confirm-orders');

Route::get('/buyer/cart/delete/{transact}', [TransactionController::class, 'delete'])->name('buyer.cart-delete'); 
Route::post('/buyer/products/select-table', [TransactionController::class, 'selectTableProcess'])->name('buyer.select-table-process');
Route::post('/buyer/cart', [TransactionController::class, 'create'])->name('buyer.cart-process');
Route::post('buyer/payment', [TransactionController::class, 'store'])->name('buyer.payment-process');
Route::post('/buyer', [ProductController::class, 'index'])->name('buyer');
Route::post('/buyer/products/search', [BuyerController::class, 'searchProcess'])->name('buyer.search-products-process');

//dan lain-lain
Route::get('/landing-page', [ProfileController::class, 'getLandingPage'])->name('landing-page');
Route::get('/about-us', [ProfileController::class, 'getAboutUs'])->name('about-us');