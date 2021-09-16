<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{


    public function index()
    {
        $links = Link::all();
        return view('links.index',compact('links'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);
        Link::create($request->all());
        return redirect()->route('links.index')->with('success', 'Link Added Succesfully');
    }
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('links.index')->with('success','Link deleted successfully');
    }
}
