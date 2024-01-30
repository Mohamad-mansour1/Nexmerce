<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sortColumn = $request->input('sort', 'created_at');
        $sortDirection = $request->input('direction', 'desc');
        $perPage = $request->limit ?: 0;
        $search = $request->search ?: null;
        $products = Product::orderBy($sortColumn, $sortDirection)
            ->where(function ($query) use ($search) {
                return $query->where('product_name', 'like', '%' . $search . '%');
            })->paginate(10);
        $products->appends(request()->query());
        return view('admin.products.index', compact('products', 'sortColumn', 'sortDirection'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'product_image' => 'required',
            'price' => 'required',
            'quantity' => 'required|integer',
            'category' => 'required|array',
        ]);

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '-' . Str::slug($request->input('product_name')) . '.webp';
            $path = 'images/products/' . $imageName;

            Image::make($image)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('webp', 80)
                ->save(public_path($path));

            $data = $request->except('_token');
            $data['product_image'] = $path;
        } else {
            $data = $request->except(['_token', 'product_image']);
        }

        $slug = Str::slug($request->input('product_name'));
        $count = Product::where('product_slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + rand(1, 1000));
            // dd($slug);
        }
        $data['product_slug'] = $slug;


        $product = Product::create($data);

        $product->categories()->sync($request->input('category', []));

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category' => 'required|array',
        ]);
        
        $product = Product::find($id);

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '-' . Str::slug($request->input('product_name')) . '.webp';
            $path = 'images/products/' . $imageName;

            Image::make($image)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('webp', 80)
                ->save(public_path($path));

            $data = $request->except('_token');
            $data['product_image'] = $path;
        } else {
            $data = $request->except(['_token', 'product_image']);
        }

        $slug = Str::slug($request->input('product_name'));
        $count = Product::where('product_slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + rand(1, 1000));
            // dd($slug);
        }
        $data['product_slug'] = $slug;

        $product->update($data);

        $product->categories()->sync($request->input('category', []));

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if (!empty($product->product_image)) {
            $imagePath = public_path($product->product_image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $product->delete();
        $productCategory = ProductCategory::where('product_id', $product->id)->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }

}
