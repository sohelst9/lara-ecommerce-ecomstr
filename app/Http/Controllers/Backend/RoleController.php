<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:view-role|create-role|edit-role|delete-role', ['only' => ['index']]);
        // $this->middleware('permission:create-role', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-role', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-role', ['only' => ['delete']]);
        $this->middleware('preventBackHistory');
    }
    public function index()
    {
        $roles = Role::latest()->paginate(20);
        return view('Backend.role.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::get();
        return view('Backend.role.create', compact('permissions'));
    }
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate(['name' => 'required|min:3|unique:roles,name']);
        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = 'admin';
        if ($role->save()) {
            $role->syncPermissions($request->permissions);
            return redirect()->route('role.index')->with('success', 'Role Created Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something Wrong. Please Try Again!');
        }
    }
    public function edit(string $id)
    {
        $permissions = Permission::get();
        $role = Role::where('id', $id)->with('permissions')->first();
        $rolePermissions = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id')
            ->all();
        return view('Backend.role.edit', compact('role', 'permissions', 'rolePermissions'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate(['name' => 'required|min:3|unique:roles,name,' . $id]);
        $role = Role::where('id', $id)->first();
        $role->update(['name' => $request->name, 'guard_name' => 'admin']);
        $role->syncPermissions($request->permissions);
        return redirect()->route('role.index')->with('success', 'Role Updated Successfully!');
    }
    public function destroy(string $id)
    {
        $role = Role::where('id', $id)->first();
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role Deleted Successfully!');
    }
}
