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
    Route::post('/payment/{registration}/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

    // My Classes Routes
    Route::get('/my-classes', [\App\Http\Controllers\MyClassController::class, 'index'])->name('my-classes.index');
    Route::get('/my-classes/{training}', [\App\Http\Controllers\MyClassController::class, 'show'])->name('my-classes.show');
    Route::post('/my-classes/module/{module}/complete', [\App\Http\Controllers\MyClassController::class, 'markComplete'])->name('my-classes.module.complete');

    // My Webinars Routes
    Route::get('/my-webinars', [\App\Http\Controllers\MyWebinarController::class, 'index'])->name('my-webinars.index');
    Route::get('/my-webinars/{training}', [\App\Http\Controllers\MyWebinarController::class, 'show'])->name('my-webinars.show');
    Route::post('/my-webinars/module/{module}/complete', [\App\Http\Controllers\MyWebinarController::class, 'markComplete'])->name('my-webinars.module.complete');

    // Debug route
    Route::get('/debug-classes', function () {
        $user = auth()->user();
        $registrations = \App\Models\Registration::where('email', $user->email)->get();
        $completed = \App\Models\Registration::where('email', $user->email)->where('status', 'completed')->get();

        return response()->json([
            'user_email' => $user->email,
            'total_registrations' => $registrations->count(),
            'completed_count' => $completed->count(),
            'registrations' => $registrations->map(fn($r) => [
                'id' => $r->id,
                'training_id' => $r->training_id,
                'status' => $r->status,
                'training_title' => $r->training->title ?? 'N/A',
                'training_category' => $r->training->category ?? 'N/A',
            ]),
        ]);
    });
});


// Services Routes
Route::prefix('services')->name('services.')->group(function () {


    Route::get('/infrastructure', function () {
        return view('services.infrastructure');
    })->name('infrastructure');

    Route::get('/network', function () {
        return view('services.network');
    })->name('network');

    Route::get('/server', function () {
        return view('services.server');
    })->name('server');

    Route::get('/securityservices', function () {
        return view('services.security');
    })->name('security');

    Route::get('/people', function () {
        return view('services.people');
    })->name('people');

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
    $posts = \App\Models\Post::with('category')
        ->whereNotNull('published_at')
        ->latest()
        ->paginate(9);
    return view('blog.index', compact('posts'));
})->name('blog.index');

Route::get('/blog/{post:slug}', function (\App\Models\Post $post) {
    return view('blog.show', compact('post'));
})->name('blog.show');

Route::get('/contact', function () {
    return view('contact');
})->name('contacts.index');

Route::post('/contact', function () {
    $data = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    \Illuminate\Support\Facades\Mail::to('hello@tirtabhumi.com')->send(new \App\Mail\ContactFormMail($data));

    return back()->with('success', 'Thank you for your message. We will get back to you soon!');
})->name('contacts.store');

Route::post('/ai-chat', function (Illuminate\Http\Request $request) {
    return response()->json(['reply' => 'Halo! Terima kasih telah mencoba demo AI kami. Untuk diskusi lebih mendalam mengenai kebutuhan ' . ($request->industry ?? 'bisnis') . ' Anda, silakan hubungi tim kami via WhatsApp.']);
})->name('ai.chat');

Route::get('/webbundling', function () {
    return view('landing-page');
})->name('webbundling');

Route::get('/digitalmarketing', function () {
    return view('services.digital-marketing');
})->name('digitalmarketing');

Route::get('/digital-services', function () {
    return view('services.digital');
})->name('services.digital');

// Locale Switcher
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('locale.switch');
