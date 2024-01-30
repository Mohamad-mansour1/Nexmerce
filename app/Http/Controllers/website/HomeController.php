<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $product_new = Product::where('product_new','on')->where('status','1')->get();
        $product_featured = Product::where('product_featured','on')->where('status','1')->get();
        $categories = Category::where('status','1')->get();
        return view('website.index',compact('product_new','product_featured','categories'));
    }
}
