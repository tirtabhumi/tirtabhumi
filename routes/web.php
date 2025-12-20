<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

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
        return view('services.digital'); })->name('digital');
    Route::get('/infrastructure', function () {
        return view('services.infrastructure'); })->name('infrastructure');
    Route::get('/network', function () {
        return view('services.network'); })->name('network');
    Route::get('/procurement', [App\Http\Controllers\ProductController::class, 'index'])->name('procurement');
    Route::get('/server', function () {
        return view('services.server'); })->name('server');
    Route::get('/securityservices', function () {
        return view('services.security'); })->name('security');
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

Route::get('/trainings', [App\Http\Controllers\TrainingController::class, 'index'])->name('trainings.index');
Route::get('/trainings/{training:slug}', [App\Http\Controllers\TrainingController::class, 'show'])->name('trainings.show');
Route::post('/trainings/{training:slug}/register', [App\Http\Controllers\TrainingController::class, 'register'])->name('trainings.register');
