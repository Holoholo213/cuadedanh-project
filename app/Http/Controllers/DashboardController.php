<?php

namespace App\Http\Controllers;

use App\Services\PostService;

class DashboardController extends Controller
{
    private $postService;
    public function __construct(PostService $postService){
        $this->postService = $postService;
    }

    public function index(){
        $posts = $this->postService->getAllPost();
        return view("manager.dashboard", compact("posts"));
    }

    public function publish(){
        return view("manager.post.publish");
    }

    public function hiding(){
        return view("manager.post.hiding");
    }

    public function favorite(){
        return view("manager.post.favorite");
    }
}