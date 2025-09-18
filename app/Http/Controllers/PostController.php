<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
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
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Max 10MB
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('picture', 'public');
            $validated['picture'] = $path;
        } else {
            // Use a default placeholder image path
            $validated['picture'] = 'picture/placeholder.png';
        }

        Post::create($validated);
        return redirect()->route('index')->with('success', 'Post created successfully.');
    }

    public function show($slug, $stamp)
    {
        $post = Post::where('slug', $slug)
            ->firstOrFail();

        $other = Post::where('id', '!=', $post->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('details', compact('post', 'other'));
    }

    public function showAll()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('tulisan', compact('posts'));
    }

}
