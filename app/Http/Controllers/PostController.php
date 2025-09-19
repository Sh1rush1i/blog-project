<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        $images = Image::all();
        return view('index', compact('posts', 'images'));
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

        $images = Image::all();

        return view('details', compact('post', 'other', 'images'));
    }

    public function showAll()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $images = Image::all();
        return view('tulisan', compact('posts', 'images'));
    }

    public function dashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $images = Image::all();
        return view('admin.dashboard', compact('posts', 'images'));
    }

    public function update(Request $request)
    {
        // Validate and update the post
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'date' => 'nullable|date',
        ]);

        $post = Post::findOrFail($request->id);
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->date = isset($validated['date']) ? Carbon::parse($validated['date']) : null;
        $post->slug = \Str::slug($validated['title']) . '-' . now()->format('YmdHis');
        $post->save();

        if ($request->hasFile('image')) {
            // Delete old images and remove files from storage
            $oldImages = Image::where('post_id', $post->id)->get();
            foreach ($oldImages as $oldImage) {
                Storage::disk('public')->delete($oldImage->path);
            }
            Image::where('post_id', $post->id)->delete();

            foreach ($request->file('image') as $file) {
                $path = $file->store('image', 'public');
                $image = new Image();
                $image->post_id = $post->id;
                $image->path = $path;
                $image->save();
            }
        }

        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }

    public function destroy(Request $request)
    {
        $post = Post::findOrFail($request->id);

        // Delete associated images and remove files from storage
        $images = Image::where('post_id', $post->id)->get();
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->path);
        }
        Image::where('post_id', $post->id)->delete();

        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
    }

}
