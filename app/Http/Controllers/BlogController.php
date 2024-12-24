<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use League\CommonMark\CommonMarkConverter;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::orderBy("created_at","desc")->paginate(10);
        $categories = Category::all();
    
        if(request()->has('search')){
            $search = request()->get('search');
            $posts = Post::where('title', 'like', '%' . $search . '%')
            ->orWhere('content', 'like', '%' . $search . '%')
            ->orderBy("created_at", "desc")
            ->paginate(10);
            // dd($posts);
        }
        // dd($posts);

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show($id){
        $converter = new CommonMarkConverter();
        $blog = Post::find($id);
        $posts = Post::orderBy('created_at','desc')->limit(3)->get();
        $categories = Category::all();
        
        if(!$blog){
            return redirect()->back()->with('error','Blog not found');
        }
        
        // foreach ($posts as $post) {
            $blog->content = $converter->convertToHtml($blog->content);
        // }
        // dd($blog->tags);
        
        return view('blog.show',compact('blog', 'posts', 'categories'));
    }
}
