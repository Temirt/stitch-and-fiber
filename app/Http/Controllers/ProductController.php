<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display featured products on the home page.
     */
    public function home()
    {
        $featured = Product::where('featured', true)->get();
        return view('home', compact('featured'));
    }

    /**
     * Display a listing of products with filtering, searching, and sorting.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Search filter
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('material', 'like', '%' . $request->search . '%');
        }

        // Category filter
        if ($request->filled('category') && $request->category !== 'All') {
            $query->where('category', $request->category);
        }

        // Sorting
        $sort = $request->input('sort', 'default');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            default:
                $query->orderBy('featured', 'desc')->orderBy('id', 'asc');
                break;
        }

        $products = $query->get();
        $categories = Product::select('category')->distinct()->pluck('category');

        return view('shop', compact('products', 'categories'));
    }

    /**
     * Display the specified product.
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        
        // Fetch related products (same category, excluding current product)
        $related = Product::where('category', $product->category)
                          ->where('id', '!=', $product->id)
                          ->limit(3)
                          ->get();

        return view('products.show', compact('product', 'related'));
    }
}
