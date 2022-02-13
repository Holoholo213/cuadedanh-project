<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\SubContentService;
use App\Services\TagService;
use App\Services\IngredientService;
use App\Models\Post;
use DOMDocument;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $categoryService;
    private $postService;
    private $subContentService;
    private $tagService;
    private $ingredientService;
    public function __construct(CategoryService $categoryService, PostService $postService, SubContentService $subContentService, TagService $tagService, IngredientService $ingredientService)
    {
        $this->categoryService = $categoryService;
        $this->postService = $postService;
        $this->subContentService = $subContentService;
        $this->tagService = $tagService;
        $this->ingredientService = $ingredientService;
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
        ]);
	
        $posts = $this->postService->createPost($validate);

        if(isset($request->tag)){
            $tagArrayId = $this->tagService->tagHandling($request->tag);
            foreach($tagArrayId as $item){
                $posts->tags()->attach($item);
            }
        }

        if(isset($request->ingredients)){
            $ingredients = $this->ingredientService->ingredientHandling($request->ingredients);
            foreach($ingredients as $index => $item){
                $posts->ingredients()->attach($item, ["values" => $request->values[$index]]);
            }
        }

        if($posts){
            return redirect()->route("dashboard");
        } else {
            dd("something");
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
        //Tăng lượt view 

        return view("manager.post.detail", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->postService->getById($id);
        $categories = $this->categoryService->getAllCategory();
        return view("manager.post.edit", compact("post", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($postId, Request $request)
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
        ]);
        $post = $this->postService->updatePost($postId, $validate);
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