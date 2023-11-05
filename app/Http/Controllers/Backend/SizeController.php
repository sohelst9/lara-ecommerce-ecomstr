<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SizeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view-size|create-size|edit-size|delete-size', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-size', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-size', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-size', ['only' => ['delete']]);
        $this->middleware('preventBackHistory');
    }
    public function index()
    {
        $sizes = Size::latest()->paginate(20);
        return view('Backend.size.index', compact('sizes'));
    }

    public function create()
    {
        return view('Backend.size.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $size = new Size();
        $size->name = $request->name;
        $size->slug = Str::slug($request->name);
        if($size->save()){
            return redirect()->route('size.index')->with('success', 'Size Added Successfully!');
        }
    }

    public function edit(string $id)
    {
        $size = Size::findOrfail($id);
        return view('Backend.size.edit', compact('size'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $size = Size::findOrfail($id);
        $size->name = $request->name;
        $size->slug = Str::slug($request->name);
        if($size->save()){
            return redirect()->route('size.index')->with('success', 'Size Updated Successfully!');
        }
    }

    public function destroy(string $id)
    {
        $size = Size::findOrfail($id);
        $size->delete();
        return redirect()->route('size.index')->with('success', 'Size Deleted Successfully!');
    }
}
