<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SlugHelper;
use App\Models\Post;

class PlaygroundController extends Controller
{
    private $slugHelper;
    public function __construct(SlugHelper $slugHelper)
    {
        $this->slugHelper = $slugHelper;
    }
    public function index(){
        $post = Post::find(2)->format();
        dd($post);
    }
}