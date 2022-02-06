<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use App\Services\CategoryService;

class DashboardController extends Controller
{
    private $postService;
    private $categoryService;
    public function __construct(PostService $postService, CategoryService $categoryService){
        $this->postService = $postService;
        $this->categoryService = $categoryService;
    }

    public function index(){
        $categories = $this->categoryService->getAllCategory();
        return view("manager.dashboard", compact("categories"));
    }
}