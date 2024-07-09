<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;
use App\Models\products;
use Illuminate\Support\Facades\Route;


Route::get('/', [userController::class, 'index'])->name('index');
Route::get('/logout', [userController::class, 'logout'])->name('logout');
Route::get('/register', [userController::class, 'register'])->name('register');
Route::get('/register/proses', [userController::class, 'prosesRegister'])->name('register.proses');
Route::get('/login', [userController::class, 'login'])->name('login');
Route::middleware('auth')->group(function () {
    // Route untuk product
    Route::get('/dashboard', [productController::class, 'dashboard'])->name('product.dashboard');
    Route::put('/product/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::delete('/product/hapus/{id}', [productController::class, 'hapus'])->name('product.hapus');
    Route::post('/product/tambah', [productController::class, 'tambah'])->name('product.tambah');

    // Route untuk categories
    Route::get('/category', [categoryController::class, 'index'])->name('category');
    Route::put('/category/edit', [categoryController::class, 'edit'])->name('category.edit');
    Route::delete('/category/hapus/{id}', [categoryController::class, 'hapus'])->name('category.hapus');
    Route::post('/category/tambah', [categoryController::class, 'tambah'])->name('category.tambah');

});