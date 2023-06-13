<?php

use Illuminate\Support\Facades\Route;

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

//Registration
Route::get('/login', function () {
    return view('registration/login');
});

//Admin
Route::get('/main-page/admin', function () {
    return view('admin/main_page_admin');
});

//Seller
Route::get('/main-page/seller', function () {
    return view('seller/main_page');
});

//User
Route::get('/main-page/user', function () {
    return view('user/main_page_user');
});