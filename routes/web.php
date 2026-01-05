<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;


Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'loginStore'])->name('login.store');
    Route::get('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'registerStore'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [App\Http\Controllers\VerificationController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\VerificationController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
    Route::post('/email/verification-notification', [App\Http\Controllers\VerificationController::class, 'resend'])->middleware(['throttle:6,1'])->name('verification.send');
});

Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Affiliate Routes
    Route::get('/affiliate', [App\Http\Controllers\AffiliateController::class, 'index'])->name('affiliate.index');
    Route::post('/affiliate/join', [App\Http\Controllers\AffiliateController::class, 'join'])->name('affiliate.join');
    Route::post('/affiliate/url', [App\Http\Controllers\AffiliateController::class, 'generateLink'])->name('affiliate.url');
});

// Webinars
Route::get('/webinars', [App\Http\Controllers\WebinarController::class, 'index'])->name('webinars.index');
Route::get('/webinars/{webinar:slug}', [App\Http\Controllers\WebinarController::class, 'show'])->name('webinars.show');
Route::post('/webinars/{webinar:slug}/register', [App\Http\Controllers\WebinarController::class, 'register'])->name('webinars.register');

// Route::get('/', function () {
//    return view('welcome');
// });
Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', function () {
    $query = Post::with('category')->whereNotNull('published_at');

    if (request('search')) {
        $query->where(function ($q) {
            $q->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('content', 'like', '%' . request('search') . '%');
        });
    }

    $posts = $query->latest()->paginate(6)->withQueryString();

    return view('blog.index', compact('posts'));
})->name('blog.index');

Route::get('/blog/{post:slug}', function (Post $post) {
    if (!$post->published_at) {
        abort(404);
    }
    return view('blog.show', compact('post'));
})->name('blog.show');

Route::get('/locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('locale.switch');

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/digital', function () {
        return view('services.digital');
    })->name('digital');
    Route::get('/infrastructure', function () {
        return view('services.infrastructure');
    })->name('infrastructure');
    Route::get('/network', function () {
        return view('services.network');
    })->name('network');
    Route::get('/procurement', App\Livewire\ProcurementSearch::class)->name('procurement');
    Route::get('/procurement/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('procurement.show');
    Route::get('/server', function () {
        return view('services.server');
    })->name('server');
    Route::get('/securityservices', function () {
        return view('services.security');
    })->name('security');
});

Route::get('/webbundling', function () {
    return view('landing-page');
})->name('webbundling');

Route::get('/digitalmarketing', function () {
    return view('services.digital-marketing');
})->name('digitalmarketing');

Route::post('/ai-chat', [App\Http\Controllers\AiChatController::class, 'chat'])->name('ai.chat');

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

    Mail::to('hello@tirtabhumi.com')->send(new ContactFormMail($data));

    return back()->with('success', 'Thank you for your message. We will get back to you soon!');
})->name('contacts.store');

Route::get('/upventure', [App\Http\Controllers\TrainingController::class, 'index'])->name('trainings.index');
Route::get('/trainings/{training:slug}', [App\Http\Controllers\TrainingController::class, 'show'])->name('trainings.show');
Route::post('/trainings/{training:slug}/register', [App\Http\Controllers\TrainingController::class, 'register'])->name('trainings.register');
