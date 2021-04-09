<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', ['roles'=>$roles]);
    }


    public function store(Request $request)
    {
        $role = $request->role;


        $request->validate([
                "role"=> 'required'
        ]);

        Role::create([
            "name"=>Str::ucfirst(Str::lower($role)),
            "slug"=>Str::lower($role)

        ]);

        return back();
    }

    public function destroy(Role $role, Request $request)
    {
        $role->delete();

        $request->session()->flash('role-delete', 'Role deleted successfuly');
        return back();
    }

    
    public function edit(Role $role)
    {
        return view('admin.roles.edit', ['role'=>$role, 'permissions'=>Permission::all()]);
    }


    public function update(Role $role, Request $request)
    {

        $request->validate([
            "role" => 'required'
        ]);
        
        $role->name =Str::ucfirst(Str::lower(request('role')));
        $role->slug =Str::lower(request('role'));

        
        if ($role->isDirty('name')) {//isDirty to check any changes in the field
            $role->update();
            $request->session()->flash('role-update', 'Role updated successfuly');
        }else{
            $request->session()->flash('role-update', 'Nothing to update');

        }


        return back();
    }


    public function attach(Role $role)
    {
        $role->permissions()->attach(request('permission'));

        return back();
    }

    public function detach(Role $role)
    {
        $role->permissions()->detach(request('permission'));

        // dd($role->permissions()->detach(request('permission')));

        return back();
    }
    


}
