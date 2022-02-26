<?php

namespace App\Http\Controllers;

use App\Models\ErrorMessage;
use App\Models\Post;
use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\SubContentService;
use App\Services\TagService;
use App\Services\IngredientService;
use App\Services\ErrorMessageService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $categoryService;
    private $postService;
    private $subContentService;
    private $tagService;
    private $ingredientService;
    private $errorMessageService;

    public function __construct(
        CategoryService $categoryService, 
        PostService $postService, 
        SubContentService $subContentService, 
        TagService $tagService, 
        IngredientService $ingredientService, 
        ErrorMessageService $errorMessageService)
    {
        $this->categoryService = $categoryService;
        $this->postService = $postService;
        $this->subContentService = $subContentService;
        $this->tagService = $tagService;
        $this->ingredientService = $ingredientService;
        $this->errorMessageService = $errorMessageService;
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
            "description" => "nullable",
            "thumb_img" => "image|mimes:jpeg,png,jpg,gif,svg|max:1024",
            "published_at" => "nullable",
            "keyword" => "nullable",
        ]);

        try {
            $posts = $this->postService->createPost($validate);
            dd($posts);
            foreach ($request->new_content as $key => $value) {
                $subFields = [];
                if(isset($request->content[$key])){
                    $subFields["content"] = $request->content[$key];
                }
                if(isset($request->img_dir[$key])){
                    $subFields["img_dir"] = $request->img_dir[$key];
                }
                if(isset($request->img_descrip[$key])){
                    $subFields["img_descrip"] = $request->img_descrip[$key];
                }
                $this->subContentService->create($posts->id, $subFields);
            }

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
            return redirect()->route("dashboard");
        } catch (\Throwable $th) {
            $this->errorMessageService->makeError($th);
            dd($th);
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
    public function update($id, Request $request)
    {
        $validate = $request->validate([
            "title" => "required",
            "category_id" => "required",
            "publish" => "nullable",
            "favorite" => "nullable",
            "description" => "nullable",
            "thumb_img" => "image|mimes:jpeg,png,jpg,gif,svg|max:1024",
            "published_at" => "nullable",
            "keyword" => "nullable",
        ]);

        try {
            $this->postService->updatePost($id, $validate);
            $post = Post::find($id);
            foreach ($request->new_content as $key => $value) {
                if($value != "true"){
                    $subFields = [];
                    if(isset($request->content[$key])){
                        $subFields["content"] = $request->content[$key];
                    }
                    if(isset($request->img_dir[$key])){
                        $subFields["img_dir"] = $request->img_dir[$key];
                    }
                    if(isset($request->img_descrip[$key])){
                        $subFields["img_descrip"] = $request->img_descrip[$key];
                    }
                    
                    $this->subContentService->update($value, $subFields);
                } else {
                    $subFields = [];
                    if(isset($request->content[$key])){
                        $subFields["content"] = $request->content[$key];
                    }
                    if(isset($request->img_dir[$key])){
                        $subFields["img_dir"] = $request->img_dir[$key];
                    }
                    if(isset($request->img_descrip[$key])){
                        $subFields["img_descrip"] = $request->img_descrip[$key];
                    }
                    $this->subContentService->create($id, $subFields);
                }
            }

            if(isset($request->tag)){
                $tagArrayId = $this->tagService->tagHandling($request->tag);
                foreach($tagArrayId as $item){
                    $post->tags()->attach($item);
                }
            }

            if(isset($request->ingredients)){
                $ingredients = $this->ingredientService->ingredientHandling($request->ingredients);
                foreach($ingredients as $index => $item){
                    $post->ingredients()->attach($item, ["values" => $request->values[$index]]);
                }
            }
            return redirect()->route("post.detail", ["id" => $id, "slug" => $post->slug]);
        } catch (\Throwable $th) {
            $this->errorMessageService->makeError($th);
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->postService->destroyPost($id);
            return redirect()->route("post.index");
        } catch (\Throwable $th) {
            $this->errorMessageService->makeError($th);
            dd($th);
        }
    }
}