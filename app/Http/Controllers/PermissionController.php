<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', ["permissions"=>$permissions]);
    }

    public function store(Request $request)
    {
        $permission = $request->permission;


        $request->validate([
            "permission" => 'required'
        ]);

        Permission::create([
            "name" => Str::ucfirst(Str::lower($permission)),
            "slug" => Str::lower($permission)

        ]);

        return back();
    }

    public function destroy(Permission $permission, Request $request)
    {
        $permission->delete();

        $request->session()->flash('permission-delete', 'Permission deleted successfuly');
        return back();
    }


    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', ['permission' => $permission]);
    }

    
}
