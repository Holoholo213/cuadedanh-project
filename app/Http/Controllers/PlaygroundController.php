<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SlugHelper;

class PlaygroundController extends Controller
{
    private $slugHelper;
    public function __construct(SlugHelper $slugHelper)
    {
        $this->slugHelper = $slugHelper;
    }
    public function index(){
        $name = "Quang Phạm";
        $slug = $this->slugHelper->slugName($name);
        dd($slug);
    }
}