<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AiChatController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/wifimurah', function () {
    return view('tirtanet');
})->name('wifi.murah');

Route::get('/upventure', function () {
    return view('upventure');
});

Route::get('/wifibisnismurah', [\App\Http\Controllers\BusinessWifiController::class , 'index'])->name('wifi.bisnis');
Route::get('/wifibisnismurah/register', [\App\Http\Controllers\BusinessWifiController::class , 'register'])->name('wifi.bisnis.register');
Route::post('/wifibisnismurah/register', [\App\Http\Controllers\BusinessWifiController::class , 'store'])->name('wifi.bisnis.store');

// Auth Routes
Route::get('/login', [AuthController::class , 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class , 'loginStore'])->name('login.store');
Route::post('/logout', [AuthController::class , 'logout'])->name('logout');
Route::get('/register', [AuthController::class , 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class , 'registerStore'])->name('register.store');

// Google SSO
Route::get('/auth/google', [AuthController::class , 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class , 'handleGoogleCallback']);

// Forgot Password Flow
Route::get('forgot-password', [AuthController::class , 'forgotPassword'])->name('password.request');
Route::post('forgot-password', [AuthController::class , 'sendResetLink'])->name('password.email');
Route::get('reset-password/{token}', [AuthController::class , 'resetPassword'])->name('password.reset');
Route::post('reset-password', [AuthController::class , 'updatePassword'])->name('password.update');

// Email Verification Routes
Route::get('/email/verify', function () {
    if (auth()->user()->hasVerifiedEmail()) {
        return redirect()->intended(route('dashboard'));
    }
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function ($id, $hash, Illuminate\Http\Request $request) {
    $user = \App\Models\User::find($id);

    if (!$user || !hash_equals((string)$hash, sha1($user->getEmailForVerification()))) {
        abort(403);
    }

    if (!$user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
        event(new \Illuminate\Auth\Events\Verified($user));
    }

    return view('auth.verified', ['name' => $user->name]);
})->middleware(['signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Illuminate\Http\Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Protected Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get(
        '/dashboard',
        function () {
            $user = auth()->user();

            if ($user->hasRole(['super_admin', 'admin', 'partner'])) {
                return redirect('/admin');
            }

            $registrations = \App\Models\Registration::with(['training.modules'])
                ->where('email', $user->email)
                ->where('status', '!=', 'cancelled')
                ->latest()
                ->get();
            return view('dashboard', compact('registrations'));
        }
        )->name('dashboard');

        Route::get('/payment/history', [PaymentController::class , 'index'])->name('payments.index');
        Route::get('/payment/{registration}', [PaymentController::class , 'show'])->name('payment.show');
        Route::post('/payment/{registration}', [PaymentController::class , 'process'])->name('payment.process');
        Route::get('/payment/{registration}/finish', [PaymentController::class , 'finish'])->name('payment.finish');
        Route::post('/payment/{registration}/cancel', [PaymentController::class , 'cancel'])->name('payment.cancel');

        // My Classes Routes
        Route::get('/my-classes', [\App\Http\Controllers\MyClassController::class , 'index'])->name('my-classes.index');
        Route::get('/my-classes/{training}', [\App\Http\Controllers\MyClassController::class , 'show'])->name('my-classes.show');
        Route::get('/my-classes/{training}/certificate', [\App\Http\Controllers\MyClassController::class , 'certificate'])->name('my-classes.certificate');
        Route::post('/my-classes/module/{module}/complete', [\App\Http\Controllers\MyClassController::class , 'markComplete'])->name('my-classes.module.complete');
        Route::post('/my-classes/module/{module}/submit', [\App\Http\Controllers\MyClassController::class , 'submitAssignment'])->name('my-classes.module.submit');

        // Certificates Route
        Route::get('/my-certificates', [\App\Http\Controllers\CertificateController::class , 'index'])->name('certificates.index');

        // Profile Routes
        Route::get('/profile', [\App\Http\Controllers\ProfileController::class , 'edit'])->name('profile.edit');
        Route::patch('/profile', [\App\Http\Controllers\ProfileController::class , 'update'])->name('profile.update');
        Route::post('/profile/avatar', [\App\Http\Controllers\ProfileController::class , 'updateAvatar'])->name('profile.avatar.update');
        Route::delete('/profile/avatar', [\App\Http\Controllers\ProfileController::class , 'deleteAvatar'])->name('profile.avatar.delete');

        // Secure Password Change Flow
        // Route::post('/profile/security/verify', [\App\Http\Controllers\ProfileController::class, 'sendPasswordChangeLink'])->name('profile.security.verify');
        /* 
     Route::get('/profile/security/change-password/{user}', [\App\Http\Controllers\ProfileController::class, 'editPassword'])
     ->name('profile.password.edit')
     ->middleware('signed');
     Route::put('/profile/security/password', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.password.update');
     */



        // Affiliate Routes
        Route::get('/affiliate', [\App\Http\Controllers\AffiliateController::class , 'index'])->name('affiliates.index');
        Route::get('/affiliate/sales', [\App\Http\Controllers\AffiliateController::class , 'sales'])->name('affiliates.sales');
        Route::get('/affiliate/points', [\App\Http\Controllers\AffiliateController::class , 'points'])->name('affiliates.points'); // New Route
        Route::post('/affiliate/register', [\App\Http\Controllers\AffiliateController::class , 'register'])->name('affiliates.register');
        Route::post('/affiliate/withdrawal', [\App\Http\Controllers\AffiliateController::class , 'requestWithdrawal'])->name('affiliates.withdrawal');

        // Profile Routes
        Route::get('/profile', [ProfileController::class , 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class , 'update'])->name('profile.update');
        Route::post('/profile/avatar', [ProfileController::class , 'updateAvatar'])->name('profile.avatar.update');
        Route::delete('/profile/avatar', [ProfileController::class , 'deleteAvatar'])->name('profile.avatar.delete');

        // Profile Password Management
        Route::post('/profile/password-link', [ProfileController::class , 'sendPasswordChangeLink'])->name('profile.password.link');
        Route::get('/profile/password/{user}', [ProfileController::class , 'editPassword'])->name('profile.password.edit')->middleware('signed');
        Route::put('/profile/password', [ProfileController::class , 'updatePassword'])->name('profile.password.update');

        // Debug route
        Route::get(
            '/debug-classes',
            function () {
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
        }
        );
    });


// Services Routes
Route::prefix('services')->name('services.')->group(function () {


    Route::get(
        '/infrastructure',
        function () {
            return view('services.infrastructure');
        }
        )->name('infrastructure');

        Route::get(
            '/network',
            function () {
            return view('services.network');
        }
        )->name('network');

        Route::get(
            '/server',
            function () {
            return view('services.server');
        }
        )->name('server');

        Route::get(
            '/securityservices',
            function () {
            return view('services.security');
        }
        )->name('security');

        Route::get(
            '/people',
            function () {
            return view('services.people');
        }
        )->name('people');

        Route::get('/procurement', [ProcurementController::class , 'index'])->name('procurement');

        Route::get('/procurement/{product}', [ProcurementController::class , 'show'])->name('procurement.show');
    });

// Training/UpVenture Routes
Route::prefix('upventure')->group(function () {
    Route::get('/', [TrainingController::class , 'index'])->name('trainings.index');
    Route::get('/list', [TrainingController::class , 'list'])->name('trainings.list');
    Route::get('/{training:slug}', [TrainingController::class , 'show'])->name('trainings.show');
    Route::post('/{training:slug}/register', [TrainingController::class , 'register'])->name('trainings.register');
});


Route::get('/blog', [\App\Http\Controllers\BlogController::class , 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [\App\Http\Controllers\BlogController::class , 'show'])->name('blog.show');

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

    // Save to database
    \App\Models\ContactSubmission::create($data);

    // Send email
    \Illuminate\Support\Facades\Mail::to('hello@tirtabhumi.com')->send(new \App\Mail\ContactFormMail($data));

    return back()->with('success', 'Thank you for your message. We will get back to you soon!');
})->name('contacts.store');

Route::post('/ai-chat', [AiChatController::class , 'chat'])->name('ai.chat');

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
