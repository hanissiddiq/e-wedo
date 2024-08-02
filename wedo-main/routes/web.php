<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\HomePageController;



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

//home
Route::get('/', [HomePageController::class, 'index']);
Route::get('/stores', [HomePageController::class, 'stores']);
Route::get('/store/product', [HomePageController::class, 'detail']);
Route::get('/purchasing', [HomePageController::class, 'create'])->middleware('auth');
Route::post('/purchasing', [HomePageController::class, 'store'])->middleware('auth');
Route::get('/orderan', [HomePageController::class, 'orderan'])->middleware('auth');
Route::get('/invoice/{id}', [HomePageController::class, 'invoice'])->middleware('auth');
Route::get('/registration', [HomePageController::class, 'registration']);
Route::post('/registration', [HomePageController::class, 'registrationProcess']);
Route::get('/store/product', [HomePageController::class, 'detail']);






//route admin area
Route::get('/panel', [AdminController::class, 'index'])->middleware('auth');


//Pengguna
Route::get('/pengguna', [UserController::class, 'index'])->middleware('auth');
Route::post('/pengguna', [UserController::class, 'store'])->middleware('auth');
Route::get('/pengguna/{id}', [UserController::class, 'destroy'])->middleware('auth');
Route::get('/pengguna/detail/{id}', [UserController::class, 'edit'])->middleware('auth');
Route::put('/pengguna/{id}', [UserController::class, 'update'])->middleware('auth');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

//Store
Route::get('/store', [StoreController::class, 'index'])->middleware('auth');
Route::get('/store/add', [StoreController::class, 'create'])->middleware('auth');
Route::post('/store', [StoreController::class, 'store'])->middleware('auth');
Route::get('/store/{id}', [StoreController::class, 'destroy'])->middleware('auth');
Route::get('/store/detail/{id}', [StoreController::class, 'edit'])->middleware('auth');
Route::put('/store/{id}', [StoreController::class, 'update'])->middleware('auth');


//Product
Route::get('/product', [ProductController::class, 'index'])->middleware('auth');
Route::get('/product/add', [ProductController::class, 'create'])->middleware('auth');
Route::post('/product', [ProductController::class, 'store'])->middleware('auth');
Route::get('/product/{id}', [ProductController::class, 'destroy'])->middleware('auth');
Route::get('/product/detail/{id}', [ProductController::class, 'edit'])->middleware('auth');
Route::put('/product/{id}', [ProductController::class, 'update'])->middleware('auth');


//purchase
Route::get('/purchase_baru', [PurchaseController::class, 'index'])->middleware('auth');
Route::get('/purchase', [PurchaseController::class, 'index'])->middleware('auth');
Route::get('/purchase/add', [PurchaseController::class, 'create'])->middleware('auth');
Route::post('/purchase', [PurchaseController::class, 'store'])->middleware('auth');
Route::get('/purchase/{id}', [PurchaseController::class, 'destroy'])->middleware('auth');
Route::get('/purchase/detail/{id}', [PurchaseController::class, 'edit'])->middleware('auth');
Route::put('/purchase/{id}', [PurchaseController::class, 'update'])->middleware('auth');
Route::get('/history', [PurchaseController::class, 'index_selesai'])->middleware('auth');


// Route::get('/purchase_proses', [PurchaseController::class, 'proses'])->middleware('auth');
// Route::get('/purchase_proses/detail/{id}', [PurchaseController::class, 'editProses'])->middleware('auth');
// Route::put('/purchase_proses/{id}', [PurchaseController::class, 'updateProses'])->middleware('auth');
// Route::get('/purchase_selesai', [PurchaseController::class, 'selesai'])->middleware('auth');

//User Profile
Route::get('/userprofile/{id}', [HomePageController::class, 'profile'])->middleware('auth');
Route::put('/userprofile/{id}', [HomePageController::class, 'updateUser'])->middleware('auth');
