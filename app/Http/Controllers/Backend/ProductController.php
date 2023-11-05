<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Backend\Category;
use App\Models\Backend\Color;
use App\Models\Backend\GalleryImage;
use App\Models\Backend\Product;
use App\Models\Backend\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view-product|create-product|edit-product|delete-product', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-product', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-product', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-product', ['only' => ['delete']]);
        $this->middleware('preventBackHistory');
    }
    public function index(Request $request)
    {
        $search = $request->product_search;
        if ($search) {
            $products = Product::where('name', 'like', "%$search%")
                ->orWhereHas('Category', function ($query) use ($search) {
                    $query->where('title', 'like', "%$search%");
                })
                ->paginate(20)->withQueryString();
            return view('Backend.product.index', compact('products'));
        } else {
            $products = Product::latest()->paginate(20);
            return view('Backend.product.index', compact('products'));
        }
    }

    public function create()
    {
        $categories = Category::get();
        return view('Backend.product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        //--get after_discount price
        $price = $request->price * ($request->discount / 100);
        $discountedPrice = $request->price - $price;
        $discount_price = round($discountedPrice, 2);
        //--upload thumbnail image
        $thumbnail = $request->file('thumbnail')->getClientOriginalExtension();
        $file_name = Str::slug($request->name) . '.' . $thumbnail;
        $image_path_name = 'Uploads/Product/Thumbnail/' . $file_name;
        $request->file('thumbnail')->move(public_path('Uploads/Product/Thumbnail'), $file_name);
        //---uplaod product table all data
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        $product->thumbnail = $image_path_name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->discount_price = $discount_price;
        $product->description = $request->description;
        $product->is_feature = $request->is_feature;
        $product->just_for_you = $request->just_for_you;
        $product->meta_title = $request->meta_title;
        $product->meta_keyword = $request->meta_keyword;
        $product->meta_description = $request->meta_description;

        if ($product->save()) {
            //---upload gallery images
            $product_id = $product->id;
            if ($request->hasFile('gallery_image')) {
                foreach ($request->file('gallery_image') as $image) {
                    $get_image = $image->getClientOriginalExtension();
                    $image_file_name = $product_id . '-' . uniqid() . '.' . $get_image;
                    $gallery_image_path_name = 'Uploads/Product/GalleryImage/' . $image_file_name;
                    $image->move(public_path('Uploads/Product/GalleryImage'), $image_file_name);
                    GalleryImage::create([
                        'product_id' => $product_id,
                        'gallery_image' => $gallery_image_path_name,
                    ]);
                }
            }
            session()->flash('success', 'Product Created Successfully!');
            return redirect()->route('product.index');
        } else {
            return back()->with('error', 'Something Wrong. Please Try Again!');
        }
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        $product = Product::where('id', $id)->with('gallery_images')->first();
        $categories = Category::get();
        return view('Backend.product.edit', compact('product', 'categories'));
    }

    public function gallery_image_delete(string $id)
    {
        $gallery_image = GalleryImage::where('id', $id)->first();
        if ($gallery_image->gallery_image) {
            File::delete(public_path($gallery_image->gallery_image));
        }
        $gallery_image->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Gallery Image Delete Successfully!'
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'image|mimes:png,jpg,jpeg,webp',
            'gallery_image.*' => 'image|mimes:png,jpg,jpeg,webp',
            'price' => 'required',
            'description' => 'required',
        ]);
        $product = Product::where('id', $id)->first();
        //--get after_discount price
        $price = $request->price * ($request->discount / 100);
        $discountedPrice = $request->price - $price;
        $discount_price = round($discountedPrice, 2);
        $product->update([
            //---update product table all data
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'discount_price' => $discount_price,
            'description' => $request->description,
            'is_feature' => $request->is_feature,
            'just_for_you' => $request->just_for_you,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
        ]);
        if ($request->hasFile('thumbnail')) {
            if ($product->thumbnail) {
                File::delete(public_path($product->thumbnail));
            }
            //--upload thumbnail image
            $thumbnail = $request->file('thumbnail')->getClientOriginalExtension();
            $file_name = Str::slug($request->name) . '- update' . '.' . $thumbnail;
            $image_path_name = 'Uploads/Product/Thumbnail/' . $file_name;
            $request->file('thumbnail')->move(public_path('Uploads/Product/Thumbnail'), $file_name);
            $product->update([
                'thumbnail' => $image_path_name
            ]);
        }

        if ($request->hasFile('gallery_image')) {
            foreach ($request->file('gallery_image') as $image) {
                $get_image = $image->getClientOriginalExtension();
                $image_file_name = $id . '-' . uniqid() . '- update' . '.' . $get_image;
                $gallery_image_path_name = 'Uploads/Product/GalleryImage/' . $image_file_name;
                $image->move(public_path('Uploads/Product/GalleryImage'), $image_file_name);
                GalleryImage::create([
                    'product_id' => $id,
                    'gallery_image' => $gallery_image_path_name,
                ]);
            }
        }
        return redirect()->route('product.index')->with('success', 'Product Updated Successfully!');
    }

    public function destroy(string $id)
    {
        $product = Product::where('id', $id)->first();
        $gallery_images = GalleryImage::where('product_id', $product->id)->get();
        if ($product) {
            if ($product->thumbnail) {
                File::delete(public_path($product->thumbnail));
            }
            if($gallery_images){
                foreach($gallery_images as $gallery_image){
                    File::delete(public_path($gallery_image->gallery_image));
                    $gallery_image->delete();
                }
            }
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Product deleted Successfully!');
        } else {
            return redirect()->route('product.index')->with('error', 'Product Not Found!');
        }
    }
}
