<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{

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
            'name' => 'required|unique:roles,name',
            'description' => 'required',
            'permissions' => 'required|array|min:1'
        ]);


        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
            'guard_name' => 'web'
        ]);

        // attach permissions
        $role->syncPermissions($request->permissions);

        return redirect('/roles')->with('msg', "Role Created Successfully!");
    }

    public function edit($id)
    {
        $roles = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::all();

        return view('roles.edit', compact('roles', 'permissions'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'. $id,
            'description' => 'required',
            'permissions' => 'required|array|min:1'
        ]);

        $role = Role::findOrFail($id);

        $role->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // attach permissions
        $role->syncPermissions($request->permissions);

        return redirect('/roles')->with('msg', "Role Updated Successfully!");
    }

    public function show($id)
    {
        $roles = Role::with('permissions', 'users')->findOrFail($id);
        return view('roles.show', compact('roles'));
    }


    public function delete($id)
    {
        $roles = Role::with('users')->findOrFail($id);

        if ($roles->name === 'Admin') {
            return response()->json([
                'status' => false,
                'message'=> 'Admin role cannot be deleted!'
            ]);
        }

        if ($roles->users->count() > 0) {
            return response()->json([
                'status' => false,
                'message'=> 'Cannot delete role because it has assigned users!'
            ]);
        }

        $roles->syncPermissions([]);
        $roles->delete();

        return response()->json(['status' => true, 'message'=> 'Role Deleted Successfully!']);
    }


}
