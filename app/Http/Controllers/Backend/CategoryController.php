<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view-category|create-category|edit-category|delete-category', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-category', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-category', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-category', ['only' => ['delete']]);
        $this->middleware('preventBackHistory');
        
    }
    public function index()
    {
        $categories = Category::latest()->paginate(20);
        return view('Backend.category.index', compact('categories'));
    }
    public function create()
    {
        return view('Backend.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp',
        ]);
        $image = $request->file('image')->getClientOriginalExtension();
        $file_name = Str::slug($request->title) . '.' . $image;
        $image_path_name = 'Uploads/Category/' . $file_name;
        $request->file('image')->move(public_path('Uploads/Category'), $file_name);
        $category = new Category();
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        $category->description = $request->description;
        $category->image = $image_path_name;
        $category->meta_title = $request->meta_title;
        $category->meta_keyword = $request->meta_keyword;
        $category->meta_description = $request->meta_description;
        if ($category->save()) {
            return redirect()->route('category.index')->with('success', 'Category Created Successfully!');
        } else {
            return redirect()->route('category.create')->with('error', 'Something Wrong. Please Try Again!');
        }
    }
    public function edit(Category $category)
    {
        return view('Backend.category.edit', compact('category'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->meta_title = $request->meta_title;
        $category->meta_keyword = $request->meta_keyword;
        $category->meta_description = $request->meta_description;
        if ($request->hasFile('image')) {
            if ($category->image) {
                File::delete(public_path($category->image));
            }
            $image = $request->file('image')->getClientOriginalExtension();
            $file_name = Str::slug($request->title) . '.' . $image;
            $image_path_name = 'Uploads/Category/' . $file_name;
            $request->file('image')->move(public_path('Uploads/Category'), $file_name);
            $category->image = $image_path_name;
        }
        if ($category->save()) {
            return redirect()->route('category.index')->with('success', 'Category Updated Successfully!');
        } else {
            return back()->with('error', 'Something Wrong. Please Try Again!');
        }
    }
    public function destroy(Category $category)
    {
        if ($category->image) {
            File::delete(public_path($category->image));
        }
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category Deleted Successfully!');
    }
}
