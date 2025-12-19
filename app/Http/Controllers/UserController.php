<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.users')->only(['index']);
        $this->middleware('permission:create.users')->only(['create', 'store']);
        $this->middleware('permission:update.users')->only(['edit', 'update']);
        $this->middleware('permission:delete.users')->only(['delete']);
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'roles' => 'required|array|min:1'
        ]);


        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        $user->syncRoles($request->roles);

        return redirect('/users')->with('msg', "User Created Successfully!");
    }


    public function show(Request $request)
    {
        //
    }


    public function edit($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('users', 'roles'));
    }


    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $users->id,
            'password' => 'nullable|min:8|confirmed',
            'roles' => 'required|array|min:1'
        ]);

        $users->name = $request->name;
        $users->email = $request->email;

        // update password only filled
        if ($request->filled('password')) {
            $users->password = Hash::make($request->password);
        }

        $users->syncRoles($request->roles);

        $users->save();

        return redirect('/users')->with('msg', "User Updated Successfully!");

    }


    public function delete($id)
    {
        //
    }
}
