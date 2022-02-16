<?php

namespace App\Http\Controllers;

use App\Helpers\SlugHelper;

class PlaygroundController extends Controller
{
    public function __construct(SlugHelper $slugHelper)
    {
        $this->slugHelper = $slugHelper;
    }
    public function index(){

    }
}