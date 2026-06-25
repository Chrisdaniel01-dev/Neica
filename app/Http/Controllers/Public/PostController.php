<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    // Blog list
    public function index()
    {
        $posts = Post::where('status', 'published')
            ->latest('published_at')
            ->get();

        return view('blog.index', compact('posts'));
    }

    // Posts
    public function show(Post $post)
{
    $recentPosts = Post::where('id', '!=', $post->id)
        ->where('status', 'published')
        ->latest('published_at')
        ->take(5)
        ->get();

    return view('blog.show', compact('post', 'recentPosts'));
}
}
