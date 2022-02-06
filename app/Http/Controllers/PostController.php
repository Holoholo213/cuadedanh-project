<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\SubContentService;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $categoryService;
    private $postService;
    private $subContentService;
    public function __construct(CategoryService $categoryService, PostService $postService, SubContentService $subContentService)
    {
        $this->categoryService = $categoryService;
        $this->postService = $postService;
        $this->subContentService = $subContentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = $this->postService->getAllPost();
        return view("manager.post.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = $this->categoryService->getAllCategory();
        return view("manager.post.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "title" => "required",
            "category_id" => "required",
            "publish" => "nullable",
            "favorite" => "nullable",
            "description" => "required",
            "thumb_img" => "image|mimes:jpeg,png,jpg,gif,svg|max:1024",
            "published_at" => "nullable",
            "content" => "nullable",
            "sub_thumb" => "nullable",
            "sub_description" => "nullable"
        ]);
        $posts = $this->postService->createPost($validate);
        if(isset($request->sub_thumb)){
            $subFields = [
                'description' => $request->sub_description,
                'img' => $request->sub_thumb
            ];
            $this->subContentService->create($posts->id, $subFields);
        }
        if($posts){
            return redirect()->route("dashboard");
        } else {
            dd("somthing");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($postId)
    {
        $post = $this->postService->getById($postId);
        return view("manager.post.detail", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}