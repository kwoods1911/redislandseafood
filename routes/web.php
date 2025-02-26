<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerQuoteController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\PDFController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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


// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/', function () {
    return view('pages.index');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/update-company-info', [ProfileController::class, 'updateCompanyInfo'])->name('profile.updatecompanyinfo');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/customer-quote', [CustomerQuoteController::class, 'listQuotes'])->name('customer-quote.list');

    Route::get('/quote-details',[CustomerQuoteController::class, 'viewQuote'])->name('customer-quote.details');
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

Route::post('/quote-summary', [QuoteController::class,'view']);

Route::post('/quote-submitted', [QuoteController::class,'store'])->name('quote-submitted');

Route::get('/generate-pdf',[PDFController::class, 'generateQuotePDF'])->name('generate-pdf');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth.session','admin')->name('admin');

Route::get('/admin/view/quote/{id}', [App\Http\Controllers\AdminController::class, 'view']);

Route::get('/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete']);

Route::get('/privacy',function(){
    return view('pages.privacy');
});

Route::get('/registration', function(){
    return view('auth.register');
})->name('registration');

Route::get('/terms',function(){
    return view('pages.termsandconditions');
});



require __DIR__.'/auth.php';
