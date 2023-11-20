<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view-banner|create-banner|edit-banner|delete-banner', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-banner', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-banner', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-banner', ['only' => ['delete']]);
        $this->middleware('permission:status-banner', ['only' => ['show']]);
        $this->middleware('preventBackHistory');
    }
    public function index()
    {
        $banners = Banner::paginate(10);
        return view('Backend.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('Backend.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp',
        ]);
        $image = $request->file('image')->getClientOriginalExtension();
        $file_name = Str::slug($request->title) . '.' . $image;
        $image_path_name = 'Uploads/Banner/' . $file_name;
        $request->file('image')->move(public_path('Uploads/Banner'), $file_name);
        $banner = new Banner();
        $banner->title = $request->title;
        $banner->slug = Str::slug($request->title);
        $banner->sub_title = $request->sub_title;
        $banner->image = $image_path_name;
        if ($banner->save()) {
            return redirect()->route('banner.index')->with('success', 'Banner Created Successfully!');
        } else {
            return redirect()->route('banner.create')->with('error', 'Something Wrong. Please Try Again!');
        }
    }
    //--change status
    public function show(Banner $banner)
    {
        if ($banner->status == 0) {
            $banner->status = 1;
        } else {
            $banner->status = 0;
        }
        $banner->save();
        return redirect()->route('banner.index')->with('success', 'Banner Status Changed!');
    }

    public function edit(Banner $banner)
    {
        return view('Backend.banner.edit', compact('banner'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,webp',
        ]);
        $banner = Banner::findOrFail($id);
        $banner->title = $request->title;
        $banner->slug = Str::slug($request->title);
        $banner->sub_title = $request->sub_title;
        if ($request->hasFile('image')) {
            if ($banner->image) {
                File::delete(public_path($banner->image));
            }
            $image = $request->file('image')->getClientOriginalExtension();
            $file_name = Str::slug($request->title) . '.' . $image;
            $image_path_name = 'Uploads/Banner/' . $file_name;
            $request->file('image')->move(public_path('Uploads/Banner'), $file_name);
            $banner->image = $image_path_name;
        }
        if ($banner->save()) {
            return redirect()->route('banner.index')->with('success', 'Banner Updated Successfully!');
        } else {
            return back()->with('error', 'Something Wrong. Please Try Again!');
        }
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image) {
            File::delete(public_path($banner->image));
        }
        $banner->delete();
        return redirect()->route('banner.index')->with('success', 'Banner Deleted Successfully!');
    }
}
