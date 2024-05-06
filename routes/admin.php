<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth.session','admin');

Route::get('/admin/view/quote/{id}', [App\Http\Controllers\AdminController::class, 'view']);

Route::get('/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete']);