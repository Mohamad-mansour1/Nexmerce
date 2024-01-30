<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $perPage = 9;
        $products = $category->products()->paginate($perPage);

        return view('website.products', compact('category', 'products'));
    }
    public function proudctDetails($slug)
    {
        $product = Product::where('product_slug', $slug)->firstOrFail();

        return view('website.productdetails', compact('product'));
    }
    
}
