<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $sortColumn = $request->input('sort', 'created_at');
        $sortDirection = $request->input('direction', 'desc');
        $perPage = $request->limit ?: 0;
        $search = $request->search ?: null;
        $categories = Category::orderBy($sortColumn, $sortDirection)
            ->where(function ($query) use ($search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })->paginate(10);
        $categories->appends(request()->query());
        return view('admin.categories.index', compact('categories', 'sortColumn', 'sortDirection'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '-' . Str::slug($request->input('name')) . '.webp';
            $path = 'images/categories/' . $logoName;

            Image::make($logo)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('webp', 80)
                ->save(public_path($path));

            $data = $request->except('_token');
            $data['logo'] = $path;
        } else {
            $data = $request->except(['_token', 'logo']);
        }

        $slug = Str::slug($request->input('name'));
        $count = Category::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + rand(1, 1000));
            // dd($slug);
        }
        $data['slug'] = $slug;
        Category::create($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $category = Category::find($id);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '-' . Str::slug($request->input('name')) . '.webp';
            $path = 'images/categories/' . $logoName;

            Image::make($logo)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('webp', 80)
                ->save(public_path($path));

            $data = $request->except('_token');
            $data['logo'] = $path;
        } else {
            $data = $request->except(['_token', 'logo']);
        }

        $slug = Str::slug($request->input('name'));
        $count = Category::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + rand(1, 1000));
            // dd($slug);
        }
        $data['slug'] = $slug;
        $category->update($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if (!empty($category->logo)) {
            $logoPath = public_path($category->logo);
            if (File::exists($logoPath)) {
                File::delete($logoPath);
            }
        }
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
