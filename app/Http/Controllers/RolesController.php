<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view.roles')->only(['index', 'show']);
        $this->middleware('permission:create.roles')->only(['create', 'save']);
        $this->middleware('permission:update.roles')->only(['edit', 'update']);
        $this->middleware('permission:delete.roles')->only('delete');
    }

    public function index()
    {
        $roles = Role::withCount('permissions', 'users')->get();
        return view('roles.index', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }


    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'description' => 'nullable|string|max:255',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name',
        ]);


        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
            'guard_name' => 'web'
        ]);

        // attach permissions
        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('roles.index')->with('msg', "Role Created Successfully!");
    }

    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::all();

        return view('roles.edit', compact('role', 'permissions'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'description' => 'nullable|string|max:255',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        $role = Role::findOrFail($id);

        $role->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // attach permissions
        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('roles.index')->with('msg', "Role Updated Successfully!");
    }

    public function show($id)
    {
        $role = Role::with('permissions', 'users')->findOrFail($id);
        return view('roles.show', compact('role'));
    }


    public function delete($id)
    {
        $role = Role::with('users')->findOrFail($id);

        if ($role->name === 'Admin') {
            return response()->json([
                'status' => false,
                'message'=> 'Admin role cannot be deleted!'
            ]);
        }

        if ($role->users->count() > 0) {
            return response()->json([
                'status' => false,
                'message'=> 'Cannot delete role because it has assigned users!'
            ]);
        }

        $role->syncPermissions([]);
        $role->delete();

        return response()->json(['status' => true, 'message'=> 'Role Deleted Successfully!']);
    }


}
