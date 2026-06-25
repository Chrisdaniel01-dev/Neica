<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // LIST POSTS
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    // CREATE FORM
    public function create()
    {
        return view('admin.posts.create');
    }

    // STORE
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required',
            'image' => 'nullable|image',
            'category' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        // Image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        // Unique slug
        $data['slug'] = $this->generateUniqueSlug($data['title']);

        // Publish logic
        if ($data['status'] === 'published') {
            $data['published_at'] = now();
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created');
    }

    // EDIT
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }


    // SHOW
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    // UPDATE
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required',
            'image' => 'nullable|image',
            'category' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        // Image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        // Slug update (only if title changed)
        if ($post->title !== $data['title']) {
            $data['slug'] = $this->generateUniqueSlug($data['title']);
        }

        // Publish logic (do NOT reset date if already published)
        if ($data['status'] === 'published' && !$post->published_at) {
            $data['published_at'] = now();
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated');
    }

    
    // DELETE
    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted');
    }

    // 🔥 UNIQUE SLUG GENERATOR (VERY IMPORTANT)
    private function generateUniqueSlug($title)
    {
       
    $slug = Str::slug($title);

    $originalSlug = $slug;
    $counter = 1;

    while (Post::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $counter;
        $counter++;
    }

    return $slug;
    }
}