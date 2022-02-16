<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;

class DashboardController extends Controller
{
    private $categoryService;
    public function __construct( CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }

    public function index(){
        $categories = $this->categoryService->getAllCategory();
        return view("manager.dashboard", compact("categories"));
    }

    public function login(){
        return view("manager.login.login");
    }
}