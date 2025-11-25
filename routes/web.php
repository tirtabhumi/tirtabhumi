<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', function () {
    $posts = Post::with('category')
        ->whereNotNull('published_at')
        ->latest()
        ->paginate(9);
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
    Route::get('/digital', function () { return view('services.digital'); })->name('digital');
    Route::get('/infrastructure', function () { return view('services.infrastructure'); })->name('infrastructure');
    Route::get('/people', function () { return view('services.people'); })->name('people');
    Route::get('/procurement', function () { return view('services.procurement'); })->name('procurement');
});

Route::get('/landingpage', function () {
    return view('landing-page');
})->name('landing-page');
