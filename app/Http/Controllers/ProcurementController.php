<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProcurementController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Category Filter
        if ($request->filled('category')) {
            $query->whereIn('category', (array) $request->category);
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
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default: // latest
                $query->latest();
                break;
        }

        $products = $query->paginate(12)->withQueryString();

        // Get unique categories for sidebar
        $categories = Product::distinct()->pluck('category')->filter()->values();

        return view('services.procurement', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('services.procurement.show', compact('product'));
    }
}
