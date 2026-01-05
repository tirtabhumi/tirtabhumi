<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProcurementController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/upventure', function () {
    return view('upventure');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');

// Google SSO
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// Forgot Password Flow
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
Route::post('forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('reset-password/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');
Route::post('reset-password', [AuthController::class, 'updatePassword'])->name('password.update');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $registrations = \App\Models\Registration::with('training')
            ->where('email', auth()->user()->email)
            ->latest()
            ->get();
        return view('dashboard', compact('registrations'));
    });

    Route::get('/payment/history', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payment/{registration}', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('/payment/{registration}', [PaymentController::class, 'process'])->name('payment.process');
    Route::get('/payment/{registration}/confirmation', [PaymentController::class, 'confirmation'])->name('payment.confirmation');
});


// Services Routes
Route::prefix('services')->name('services.')->group(function () {
    Route::get('/digital-marketing', function () {
        return view('services.digital');
    })->name('digital');

    Route::get('/it-infrastructure', function () {
        return view('services.infrastructure');
    })->name('infrastructure');

    Route::get('/procurement', [ProcurementController::class, 'index'])->name('procurement');
    Route::get('/procurement/{product}', [ProcurementController::class, 'show'])->name('procurement.show');
});

// Training/UpVenture Routes
Route::prefix('upventure')->group(function () {
    Route::get('/', [TrainingController::class, 'index'])->name('trainings.index');
    Route::get('/webinars', [TrainingController::class, 'webinars'])->name('trainings.webinars');
    Route::get('/classes', [TrainingController::class, 'classes'])->name('trainings.classes');
    Route::get('/{training:slug}', [TrainingController::class, 'show'])->name('trainings.show');
    Route::post('/{training:slug}/register', [TrainingController::class, 'register'])->name('trainings.register');
});


Route::get('/blog', function () {
    return view('blog.index');
})->name('blog.index');

Route::get('/blog/{post:slug}', function (\App\Models\Post $post) {
    return view('blog.show', compact('post'));
})->name('blog.show');

Route::get('/contacts', function () {
    return view('contacts.index');
})->name('contacts.index');

// Locale Switcher
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('locale.switch');
