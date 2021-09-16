<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PublicController extends Controller
{
    public function index()
    {
        $latestposts = Post::where('featured', '=', '0')->limit(3)->get();
        $featuredposts = Post::where('featured', '=', '1')->limit(3)->get();
        $categories = Category::all();
        $moreposts = Post::inRandomOrder()->limit(10)->get();
        return view('public',compact('latestposts', 'categories', 'featuredposts', 'moreposts'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
