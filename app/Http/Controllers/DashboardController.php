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
        $posts = $this->postService->getAllPost()->map->dashboardFormat();
        $favorites = $this->postService->getAllPost()->where('favorite', '1')->map->dashboardFormat();
        $hiddens = $this->postService->getAllPost()->where("publish", "0")->map->dashboardFormat();
        $publishes = $this->postService->getAllPost()->where("publish", "1")->map->dashboardFormat();
        return view("manager.dashboard", compact("posts", "favorites", "hiddens", "publishes"));
    }

    public function publish(){
        $posts = $this->postService->getAllPost()->where("publish", "1");
        return view("manager.post.publish", compact("posts"));
    }

    public function hiding(){
        $posts = $this->postService->getAllPost()->where("publish", "0");
        return view("manager.post.hiding", compact("posts"));
    }

    public function favorite(){
        $posts = $this->postService->getAllPost()->where("favorite", "1");
        return view("manager.post.favorite", compact("posts"));
    }
}