<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuoteController;

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

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/product', function() {
    return view('pages.products');
});

Route::get('/about', function() {
    return view('pages.aboutus');
});

Route::get('/quote', function(){
    return view('pages.quote');
})->name('quote');

Route::get('/contact', function(){
    return view('pages.contactus');
})->name('contact');

Route::post('/store-contact',[ContactController::class,'store']);

Route::post('/quote-summary', [QuoteController::class,'store']);