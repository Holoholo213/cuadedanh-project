<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;

class GuestController extends Controller
{
    private $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function index(){
        try {
            $posts = Post::orderBy('published_at', 'DESC')->where('publish', '1')->paginate(4);
            $favorites = Post::orderBy('published_at', 'DESC')->where('publish', '1')->where('favorite', '1')->paginate(3);
            $random_post = Post::inRandomOrder()->where('publish', '1')->paginate(5);
            return view("index", compact('posts', 'favorites', 'random_post'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function category($slug){
        $category = Category::where("slug", $slug)->first();
        return view('guest.category', compact('category'));
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->first();
        return view('guest.detail', compact('post'));
    }
}
