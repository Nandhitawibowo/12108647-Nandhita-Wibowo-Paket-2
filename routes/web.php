<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;

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

Route::get('/', [UserController::class, 'index'])->name('login');

    Route::post('/login/auth', [UserController::class, 'store'])->name('login.auth');

        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/data-user', [UserController::class, 'create'])->name('data-user');
        Route::get('/data-user/create', [UserController::class, 'user'])->name('create-user');
        Route::post('/data-user/post', [UserController::class, 'buat'])->name('post.user');
        Route::get("/data-user/edit/{id}", [UserController::class, 'edit'])->name('user.edit');
        Route::patch("/data-user/update/{id}", [UserController::class, 'update'])->name('user.update');
        Route::delete("/data-user/delete/{id}", [UserController::class, 'destroy'])->name('user.delete');
        
        Route::get('/list-product', [ProdukController::class, 'index'])->name('product.list');
        Route::get('/list-product/create', [ProdukController::class, 'create'])->name('create-product');
        Route::post('/list-product/post', [ProdukController::class, 'store'])->name('post.product');
        Route::get("/list-product/edit/{id}", [ProdukController::class, 'edit'])->name('product.edit');
        Route::patch("/list-product/update/{id}", [ProdukController::class, 'update'])->name('product.update');
        Route::patch("/list-product/upgrade/{id}", [ProdukController::class, 'ubah'])->name('stock.update');
        Route::delete("/list-product/delete/{id}", [ProdukController::class, 'destroy'])->name('product.delete');

        Route::get('/list-product', [ProdukController::class, 'index'])->name('product.list');

        Route::get('/sales-data', [PenjualanController::class, 'index'])->name('sales.data');
        Route::get('/sales-data/add', [PenjualanController::class, 'create'])->name('sales.add');
        Route::post('/sales-data/post', [PenjualanController::class, 'store'])->name('sales.store');
        Route::delete("/sales-data/delete/{id}", [PenjualanController::class, 'destroy'])->name('sales.delete');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');