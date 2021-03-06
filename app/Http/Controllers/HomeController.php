<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        // $posts = Post::all()->where('category_id', 3);
        $categories = Category::all();
        return view('home', ['posts'=>$posts, 'categories'=>$categories]);
    }
    
    public function category(Category $category)
    {
        $category = Category::find($category->id);
        $posts = $category->posts()->paginate(5);
        // $posts =Post::paginate(5)->where('category_id', $category->id);
        $categories = Category::all();
        return view('home', ['posts' => $posts, 'categories' => $categories]);
        
    }
    
    public function postBySearch(Request $request, Category $category)
    {
        $search_input = "%".strip_tags($request->search)."%";
        $categories = Category::all();
        // dd($search_input);
        $posts = Post::where('title','LIKE', $search_input)->orWhere('body', 'LIKE', $search_input)->paginate(5);
        return view('home', ['posts' => $posts, 'categories' => $categories]);


    }
    
}
