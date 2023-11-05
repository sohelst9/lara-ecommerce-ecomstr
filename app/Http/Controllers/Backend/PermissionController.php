<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view-permission|create-permission|edit-permission|delete-permission', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-permission', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-permission', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-permission', ['only' => ['delete']]);
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        $permissions = Permission::latest()->paginate(20);
        return view('Backend.permission.index', compact('permissions'));
    }
    public function create()
    {
        return view('Backend.permission.create');
    }
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|min:3|unique:permissions,name']);
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->guard_name = 'admin';
        if($permission->save()){
            return redirect()->route('permission.index')->with('success', 'Permission Created Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Wrong. Please Try Again!');
        }
    }
    public function edit(string $id)
    {
        $permission = Permission::where('id', $id)->first();
        return view('Backend.permission.edit', compact('permission'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate(['name' => 'required|min:3|unique:permissions,name,'.$id]);
        $permission = Permission::where('id', $id)->first();
        $permission->name = $request->name;
        $permission->guard_name = 'admin';
        if($permission->save()){
            return redirect()->route('permission.index')->with('success', 'Permission Updated Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Wrong. Please Try Again!');
        }
    }
    public function destroy(string $id)
    {
        $permission = Permission::where('id', $id)->first();
        $permission->delete();
        return redirect()->route('permission.index')->with('success', 'Permission Deleted Successfully!');
    }
}
