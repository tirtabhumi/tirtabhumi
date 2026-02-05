<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProcurementController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Category Filter
        if ($request->filled('category')) {
            $categorySlug = $request->category;
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        // Platform Filter
        if ($request->filled('platform')) {
            $query->where(function ($q) use ($request) {
                foreach ((array) $request->platform as $platform) {
                    $q->orWhereJsonContains('platforms', $platform);
                }
            });
        }

        // Sort
        $sort = $request->input('sort', 'latest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'oldest':
                $query->oldest();
                break;
            default: // latest
                $query->latest();
                break;
        }

        $products = $query->paginate(12)->withQueryString();

        // Get categories that are relevant to procurement
        $categories = \App\Models\Category::whereIn('slug', ['barang', 'jasa', 'konstruksi', 'konsultasi'])->get();

        return view('services.procurement', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('services.procurement.show', compact('product'));
    }
}
