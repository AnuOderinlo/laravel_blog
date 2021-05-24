<?php

namespace App\Http\Controllers;

use posts;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function show(Post $post)
    {
        // dd($id);
        
        return view('blog-post', ['post'=>$post, 'categories'=>Category::all()]);
    }


    public function index()
    {
        $posts = Post::all();// To show all the posts in the database.
        // $posts = Auth::user()->posts()->paginate(3);//To show all the posts for a specific user
        
        // $posts->withPath('admin/post/index');
        return view('admin.posts.index', ['posts'=>$posts]);
    }

    /* 
        This function delete a post
     */
    public function destroy(Post $post, Request $request)
    {

        $response = Gate::inspect('delete', $post);

        if ($response->allowed()) {
            $request->session()->flash('message', 'Post deleted successfully');
            $post->delete();
        } else {
            $request->session()->flash('message', $response->message());
        }

        return back();
        
    }


    public function create()
    {
        $categories = Category::all();
        
        return view('admin.posts.create', ['categories'=>$categories]);
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        
        return view('admin.posts.edit', ['post'=>$post,'categories'=>$categories]);
    }

    public function store(Request $request)
    {

        $inputs = request()->validate([
            'title'=>'required|min:5 max:225',
            'category_id'=>'required',
            'post_image'=> 'file',
            'body'=>'required'

        ]);

        

        // return view('admin.posts.create');

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }
        
        // $posts = Post::create($inputs);

        Auth::user()->posts()->create($inputs);
        $request->session()->flash('success-message', 'Post created successfully');

        return redirect()->route('post.index');
    }


    public function update(Post $post, Request $request)
    {

        $inputs = request()->validate([
            'title'=>'required|min:5 max:225',
            'post_image'=> 'file',
            'category_id'=>'required',
            'body'=>'required'

        ]);
        // return view('admin.posts.create');

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }

        $response = Gate::inspect('update', $post);

        if ($response->allowed()) {
            $request->session()->flash('update-message', 'Successfully updated Post');
            $post->update($inputs);
        } else {
            $request->session()->flash('message', $response->message());
        }


       // Gate::authorize('update', $post);
        // $post->update($inputs);
       
        

        return redirect()->route('post.index');
    }
}

