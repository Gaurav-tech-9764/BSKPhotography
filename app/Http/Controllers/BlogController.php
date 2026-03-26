<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::published()->latest('published_at')->paginate(9);
        return view('public.blog', compact('posts'));
    }

    public function show(BlogPost $post)
    {
        if (!$post->is_published) {
            abort(404);
        }
        $recentPosts = BlogPost::published()->where('id', '!=', $post->id)->latest('published_at')->take(3)->get();
        return view('public.blog-detail', compact('post', 'recentPosts'));
    }
}
