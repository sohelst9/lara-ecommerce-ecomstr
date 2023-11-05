<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view-color|create-color|edit-color|delete-color', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-color', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-color', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-color', ['only' => ['delete']]);
        $this->middleware('preventBackHistory');
    }
    public function index()
    {
        $colors = Color::latest()->paginate(20);
        return view('Backend.color.index', compact('colors'));
    }

    public function create()
    {
        return view('Backend.color.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $color = new Color();
        $color->name = $request->name;
        $color->slug = Str::slug($request->name);
        if($color->save()){
            return redirect()->route('color.index')->with('success', 'Color Added Successfully!');
        }
    }

    public function edit(string $id)
    {
        $color = Color::findOrfail($id);
        return view('Backend.color.edit', compact('color'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $color = Color::findOrfail($id);
        $color->name = $request->name;
        $color->slug = Str::slug($request->name);
        if($color->save()){
            return redirect()->route('color.index')->with('success', 'Color Updated Successfully!');
        }
    }

    public function destroy(string $id)
    {
        $color = Color::findOrfail($id);
        $color->delete();
        return redirect()->route('color.index')->with('success', 'Color Deleted Successfully!');
    }
}
