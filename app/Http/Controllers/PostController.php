<?php

namespace App\Http\Controllers;

use App\Models\Image;
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
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'date' => 'nullable|date',
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->date = isset($validated['date']) ? Carbon::parse($validated['date']) : null;
        $post->slug = \Str::slug($validated['title']) . '-' . now()->format('YmdHis');
        $post->save();

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $path = $file->store('image', 'public');
                $image = new Image();
                $image->post_id = $post->id;
                $image->path = $path;
                $image->save();
            }
        } else {
            $image = new Image();
            $image->post_id = $post->id;
            $image->path = 'image/placeholder.png';
            $image->save();
        }

        return redirect()->route('dashboard')->with('success', 'Post created successfully.');
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

    public function dashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $images = Image::all();
        return view('admin.dashboard', compact('posts', 'images'));
    }

}
