<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index']);
Route::get('/register', [UserController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/cabinet', [UserController::class, 'showCabinet'])->name('showCabinet');
Route::get('/order', [OrderController::class, 'formOrder'])->name('formOrder');
Route::post('/order', [OrderController::class, 'storeOrder'])->name('storeOrder');


Route::get('/admin', [UserController::class, 'showAdmin'])->name('showAdmin');
Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('updateStatus');
Route::post('/order/{id}/comment', [OrderController::class, 'addComment'])->name('addComment');

