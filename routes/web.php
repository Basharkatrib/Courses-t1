<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

// Stripe Routes
Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::post('/create-checkout-session', [StripeController::class, 'createCheckoutSession'])->name('create-checkout-session');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [SignUpController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [SignUpController::class, 'register']);

// Google Authentication Routes
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('log');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Email Verification Routes
Route::get('/email/verify', [\App\Http\Controllers\Auth\VerificationController::class, 'show'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\Auth\VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/resend', [\App\Http\Controllers\Auth\VerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// Profile Routes
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

// Course and Video Routes
Route::get('/', [CourseController::class, 'index'])->name('home');
Route::get('/search', [CourseController::class, 'search'])->name('search');

Route::middleware(['auth'])->group(function () {
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');
    Route::post('/comments/{videoId}', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

// Static Pages
Route::get('/check', function () {
    return view('User.checkout');
});

Route::get('/payment', function () {
    return view('User.payment');
});

