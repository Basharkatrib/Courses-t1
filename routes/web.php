<?php

use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use Laravel\Nova\Http\Controllers\DashboardController;
use Laravel\Nova\Http\Requests\DashboardCardRequest;

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
Route::get('/search', [CourseController::class, 'search'])->name('search');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('log');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);



Route::middleware(['auth'])->group(function () {
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');

   
    Route::post('/comments/{videoId}', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});



Route::get('/check', function () {
    return view('User.checkout');
});

Route::get('/payment', function () {
    return view('User.payment');
});
