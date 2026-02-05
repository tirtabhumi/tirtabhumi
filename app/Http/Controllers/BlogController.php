<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('category')->whereNotNull('published_at');

        // Search Filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Category Filter
        if ($request->filled('category')) {
            $categorySlug = $request->category;
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        // Sorting
        $sort = $request->input('sort', 'latest');
        if ($sort === 'oldest') {
            $query->oldest('published_at');
        }
        else {
            $query->latest('published_at');
        }

        $posts = $query->paginate(9)->withQueryString();

        // Fetch categories that have posts, ensures we always have a collection
        $categories = Category::has('posts')->get() ?? collect();

        return view('blog.index', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }
}
