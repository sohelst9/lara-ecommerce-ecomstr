<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view-staff|create-staff|edit-staff|delete-staff', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-staff', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-staff', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-staff', ['only' => ['delete']]);
        $this->middleware('preventBackHistory');
    }
    public function index()
    {
        $staffs = Admin::with('roles')->paginate(20);
        return view('Backend.staff.index', compact('staffs'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('Backend.staff.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6|max:14',
            'roles' => 'required'
        ]);
        $staff = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($request->hasFile('iamge')) {
            $image = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = 'Uploads/Admin/' . $image;
            $request->file('image')->move(public_path('Uploads/Admin'), $image);
            $staff->update([
                'image' => $path,
            ]);
        }
        if ($staff) {
            $staff->syncRoles($request->roles);
            session()->flash('success', 'Staff Created Successfully!');
            return redirect()->route('staff.index');
        } else {
            session()->flash('error', 'Something Wrong. Please Try Again!');
            return redirect()->route('staff.create');
        }
    }
    public function show(string $id)
    {
        //
    }
    public function edit(Admin $staff)
    {
        $roles = Role::all();
        $staff_assign_role_gets = DB::table('model_has_roles')
            ->where('model_has_roles.model_id',$staff->id)
            ->pluck('model_has_roles.role_id')
            ->all();
        return view('Backend.staff.edit', compact('staff', 'roles', 'staff_assign_role_gets'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:admins,email,'.$id,
            'roles' => 'required'
        ]);
        $staff = Admin::where('id', $id)->first();
        $staff->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($request->hasFile('iamge')) {
            if($staff->image){
                File::delete(public_path($staff->image));
            }
            $image = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = 'Uploads/Admin/' . $image;
            $request->file('image')->move(public_path('Uploads/Admin'), $image);
            $staff->update([
                'image' => $path,
            ]);
        }
        if($request->password){
            $request->validate(['password' => 'required|min:6|max:14',]);
            $staff->update(['password' => Hash::make($request->password)]);
        }
        if ($staff) {
            $staff->syncRoles($request->roles);
            session()->flash('success', 'Staff Updated Successfully!');
            return redirect()->route('staff.index');
        } else {
            session()->flash('error', 'Something Wrong. Please Try Again!');
            return redirect()->back();
        }
    }
    public function destroy(string $id)
    {
        //
    }
}
