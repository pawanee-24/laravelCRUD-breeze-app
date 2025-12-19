<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view.permissions')->only(['index', 'show']);
        $this->middleware('permission:create.permissions')->only(['create', 'save']);
        $this->middleware('permission:update.permissions')->only(['edit', 'update']);
        $this->middleware('permission:delete.permissions')->only('delete');
    }


    public function index()
    {
        $permissions = Permission::withCount('roles')->get();
        return view('permissions.index', compact('permissions'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('permissions.create', compact('roles'));
    }


    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
            'description' => 'nullable|string|max:255',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,name',
        ]);


        $permissions = Permission::create([
            'name' => $request->name,
            'description' => $request->description,
            'guard_name' => 'web'
        ]);

        // attach roles
        $permissions->syncRoles($request->roles);

        return redirect('/permissions')->with('msg', "Permissions Created Successfully!");
    }

    public function edit($id)
    {
        $permissions = Permission::with('roles')->findOrFail($id);
        $roles = Role::all();

        return view('permissions.edit', compact('permissions', 'roles'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
            'description' => 'nullable|string|max:255',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,name',
        ]);

        $permission = Permission::findOrFail($id);

        $permission->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // attach roles
        $permission->syncRoles($request->roles);

        return redirect('/permissions')->with('msg', "Permission Updated Successfully!");
    }

    public function show($id)
    {
        $permissions = Permission::with('roles', 'users')->findOrFail($id);
        return view('permissions.show', compact('permissions'));
    }


    public function delete($id)
    {
        $permissions = Permission::with('roles')->findOrFail($id);

        if ($permissions->roles->count() > 0) {
            return response()->json([
                'status' => false,
                'message'=> 'Cannot delete permission because it has assigned roles!'
            ]);
        }

        $permissions->delete();

        return response()->json(['status' => true, 'message'=> 'Permission Deleted Successfully!']);
    }

}
