<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\PDFController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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


Route::get('/registration', function(){
    return view('auth.register');
})->name('registration');



Route::post('/store-contact',[ContactController::class,'store']);

Route::post('/quote-summary', [QuoteController::class,'view']);

Route::post('/quote-submitted', [QuoteController::class,'store'])->name('quote-submitted');

Route::get('/generate-pdf',[PDFController::class, 'generateQuotePDF'])->name('generate-pdf');

Auth::routes([
    'verify' => true
]);


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth.session','admin');

Route::get('/admin/view/quote/{id}', [App\Http\Controllers\AdminController::class, 'view']);

Route::get('/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete']);

Route::get('/privacy',function(){
    return view('pages.privacy');
})


