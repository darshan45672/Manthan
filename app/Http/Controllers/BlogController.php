<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use League\CommonMark\CommonMarkConverter;

class BlogController extends Controller
{
    public function index()
    {
        $cacheDuration = 60;

        request()->validate([
            'search' => 'nullable|string|max:255',
        ]);

        $search = request()->get('search');

        if (request()->filled('search')) {
            $cacheKey = "blog_search_" . md5($search);
            $posts = Cache::remember($cacheKey, $cacheDuration, function () use ($search) {
                return Post::where('title', 'like', "%$search%")
                    ->orWhere('content', 'like', "%$search%")
                    ->orderBy("created_at", "desc")
                    ->paginate(10);
            });
        } else {
            $posts = Cache::remember('blog_posts', $cacheDuration, function () {
                return Post::orderBy("created_at", "desc")->paginate(10);
            });
        }

        $categories = Cache::remember('blog_categories', $cacheDuration, function () {
            return Category::get();
        });

        return view('blog.index', compact('posts', 'categories'));
    }


    public function show($id)
    {
        $cacheDuration = 60;
        $converter = new CommonMarkConverter();

        $blog = Cache::remember("blog_{$id}", $cacheDuration, function () use ($id, $converter) {
            $post = Post::with(['category', 'user'])->find($id); // Eager loading
            if ($post) {
                $post->content = $converter->convertToHtml($post->content);
            }
            return $post;
        });

        if (!$blog) {
            return redirect()->back()->with('error', 'Blog not found');
        }

        $posts = Cache::remember('latest_posts', $cacheDuration, function () {
            return Post::latest()->limit(3)->get();
        });

        $categories = Cache::remember('blog_categories', $cacheDuration, function () {
            return Category::all();
        });

        return view('blog.show', compact('blog', 'posts', 'categories'));
    }

}
