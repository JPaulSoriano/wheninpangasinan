<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin')->except('show', 'categorizedpost');
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {   
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tags' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        $tags = explode(",", $request->tags);
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $coverImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $coverImage);
            $input['image'] = "$coverImage";
        }
    
        $post = Auth::user()->posts()->create($input);
        $post->tag($tags);

        return redirect()->route('posts.index')->with('success', 'Posted Succesfully');
    }
    public function show(Post $post)
    {
        $moreposts = Post::inRandomOrder()->limit(5)->get();
        return view ('posts.show', compact('post', 'moreposts'));
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view ('posts.edit', compact('post', 'categories'));
    }
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

         $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $coverImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $coverImage);
            $input['image'] = "$coverImage";
        }else{
            unset($input['image']);
        }
          
        $post->update($input);

        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post deleted successfully');
    }

    public function categorizedpost(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->latest()->paginate(5);
        return view('posts.categorizedpost',compact('posts', 'category'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function allposts()
    {
        $allposts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.allposts',compact('allposts'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function unfeature(Post $post)
    {
        $post->featured = '0';
        $post->save();

        return redirect()->route('posts.index');
    }

    public function feature(Post $post)
    {
        $post->featured = '1';
        $post->save();

        return redirect()->route('posts.index');
    }
}
