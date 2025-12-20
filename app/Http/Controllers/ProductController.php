<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Product::query();

        // Handle array or string input for category
        if ($request->filled('category')) {
            $categories = is_array($request->category) ? $request->category : [$request->category];
            $query->whereIn('category', $categories);
        }

        // Handle array or string input for platform
        if ($request->filled('platform')) {
            $platforms = is_array($request->platform) ? $request->platform : [$request->platform];
            $query->where(function ($q) use ($platforms) {
                foreach ($platforms as $platform) {
                    $q->orWhereJsonContains('platforms', $platform);
                }
            });
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sorting
        switch ($request->input('sort')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(12)->withQueryString();

        $categories = \App\Models\Product::distinct()->pluck('category');

        return view('services.procurement', compact('products', 'categories'));
    }
    public function show(\App\Models\Product $product)
    {
        return view('services.procurement.show', compact('product'));
    }
}
