<?php

use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;


Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::post('/create-checkout-session', [StripeController::class, 'createCheckoutSession'])->name('create-checkout-session');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');


Route::get('/register', [SignUpController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [SignUpController::class, 'register']);

Route::get('/', [CourseController::class, 'index'])->name('home');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('log');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);



Route::middleware(['auth'])->group(function () {
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');
    Route::post('/videos/{video}/comments', [CommentController::class, 'store'])->name('comments.store');
  
});



Route::get('/check',function(){
    return view('User.checkout');
});






