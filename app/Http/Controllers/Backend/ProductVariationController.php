<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Color;
use App\Models\Backend\Product;
use App\Models\Backend\ProductVariation;
use App\Models\Backend\Size;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:show-variation|create-variation|edit-variation|delete-variation', ['only' => ['show']]);
        $this->middleware('permission:create-variation', ['only' => ['show', 'store']]);
        $this->middleware('permission:edit-variation', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-variation', ['only' => ['delete']]);
    }
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'quantity' => 'required'
        ]);

        if (ProductVariation::where([
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
        ])->exists()) {
            ProductVariation::where([
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
            ])->increment('quantity', $request->quantity);
            $product = Product::where('id', $request->product_id)->first();
            $product->increment('quantity', $request->quantity);
            return back()->with('success', 'Product Quantity Increment Success');
        } else {
            $variation = new ProductVariation();
            $variation->product_id = $request->product_id;
            $variation->size_id = $request->size_id;
            $variation->color_id = $request->color_id;
            $variation->quantity = $request->quantity;
            if ($variation->save()) {
                $product = Product::where('id', $request->product_id)->first();
                $product->increment('quantity', $request->quantity);
                return back()->with('success', 'Product Variation Added!');
            } else {
                return back()->with('error', 'Something Wrong!');
            }
        }
    }

    public function show(string $id)
    {
        $sizes = Size::get();
        $colors = Color::get();
        $product = Product::findOrFail($id);
        $productVariations = ProductVariation::where('product_id', $product->id)->get();
        $total_quantity = ProductVariation::where('product_id', $product->id)->sum('quantity');
        return view('Backend.product.variation.add', compact('product', 'sizes', 'colors', 'productVariations', 'total_quantity'));
    }
    public function edit(string $id)
    {
        $sizes = Size::get();
        $colors = Color::get();
        $variation = ProductVariation::FindOrFail($id);
        $product = Product::findOrFail($variation->product_id);
        return view('Backend.product.variation.edit', compact('product', 'sizes', 'colors', 'variation'));
    }
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'quantity' => 'required'
        // ]);
        // $variation = ProductVariation::where('id', $id)->first();
        // if (ProductVariation::where([
        //     'product_id' => $request->product_id,
        //     'color_id' => $request->color_id,
        //     'size_id' => $request->size_id,
        // ])->exists()) {
        //     ProductVariation::where([
        //         'product_id' => $request->product_id,
        //         'color_id' => $request->color_id,
        //         'size_id' => $request->size_id,
        //     ])->increment('quantity', $request->quantity);
        //     $product = Product::where('id', $request->product_id)->first();
        //     $product->increment('quantity', $request->quantity);
        //     return back()->with('success', 'Product Quantity Increment Success');
        // } else {
        //     $variation = new ProductVariation();
        //     $variation->product_id = $request->product_id;
        //     $variation->size_id = $request->size_id;
        //     $variation->color_id = $request->color_id;
        //     $variation->quantity = $request->quantity;
        //     if ($variation->save()) {
        //         $product = Product::where('id', $request->product_id)->first();
        //         $product->increment('quantity', $request->quantity);
        //         return back()->with('success', 'Product Variation Added!');
        //     } else {
        //         return back()->with('error', 'Something Wrong!');
        //     }
        // }
    }

    public function destroy(string $id)
    {
        $variation = ProductVariation::where('id', $id)->first();
        $product = Product::where('id', $variation->product_id)->first();
        if($variation){
            $product->decrement('quantity', $variation->quantity);
            $variation->delete();
            return back()->with('success', 'Product Variation Deleted Successfully!');
        }else{
            return back()->with('error', 'Something Wrong!');
        }

    }
}
