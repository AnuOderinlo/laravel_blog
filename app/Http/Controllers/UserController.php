<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    

    public function show(User $user)
    {

        return view('admin.users.profile', ['user'=>$user, 'roles'=>Role::all()]);
    }


    public function attach(User $user)
    {
        $user->roles()->attach(request('role'));

        return back();
    }

    public function detach(User $user)
    {
        $user->roles()->detach(request('role'));

        return back();
    }

    public function index()
    {
        $users = User::all();
        // $users = Auth::user()->paginate(3);
        return view('admin.users.index', ['users'=>$users]);
    }

    public function destroy(User $user, Request $request)
    {
        /* This is the Gate policy for authorization */
        // $response = Gate::inspect('delete', $user);

        // if ($response->allowed()) {
        //     $request->session()->flash('message', 'user deleted successfully');
        //     $user->delete();
        // } else {
        //     $request->session()->flash('message', $response->message());
        // }

        // dd($request->id);
        $request->session()->flash('message', 'user deleted successfully');
        $user->delete();

        return back();
    }

    public function update(User $user, Request $request)
    {
        
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_image' => 'file'
            
        ]);
            // return view('admin.posts.create');
        // dd($inputs['profile_image']);
            
        
        if (request('profile_image')) {
            $inputs['profile_image'] = request('profile_image')->store('images');
        }

        $user->update($inputs);

        return back();

        
    }
}
