<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Validate and store the post
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'picture' => 'nullable',
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('images', 'public');
            $validated['picture'] = $path;
        } else {
            // Use a default placeholder image path
            $validated['picture'] = 'images/placeholder.png';
        }

        Post::create($validated);
        return redirect()->route('index')->with('success', 'Post created successfully.');
    }

}
