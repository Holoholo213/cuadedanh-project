<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view("/", "layouts.guest.header");

Route::controller(GuestController::class)->prefix('/')->group(function () {
    Route::get('/', "index")->name("guest.index");
    Route::get("/category/{slug}", 'category')->name('guest.category');
    Route::get('/{slug}', 'show')->name('guest.show');
});

Route::middleware(["auth"])->prefix("/manager")->group(function(){

    Route::controller(CategoryController::class)->prefix("/category")->group(function(){
        Route::get("/", "index")->name("category.index");
        Route::get("/detail/{id}/{slug}", "show")->name("category.detail");
        Route::post("/store", "store")->name("category.store");
        Route::put("/update/{id}", "update")->name("category.update");
        Route::delete("/destroy/{id}", "destroy")->name("category.destroy");
    });

    Route::controller(PostController::class)->prefix("/post")->group(function(){
        Route::get("/", "index")->name("post.index");
        Route::get("/create", "create")->name("post.create");
        Route::get("/detail/{id}/{slug}", "show")->name("post.detail");
        Route::get("/edit/{id}", "edit")->name("post.edit");
        Route::post("/update/{id}", "update")->name("post.update");
        Route::post("/store", "store")->name("post.store");
        Route::delete('/destroy/{id}', "destroy")->name("post.destroy");
    });

    Route::controller(TagController::class)->prefix("tags")->group(function(){
        Route::get('/', "index")->name("tags.index");
        Route::post('/store', "store")->name("tags.store");
        Route::put('/update/{id}', "update")->name("tags.update");
        Route::delete('/destroy/{id}', "destroy")->name("tags.destroy");
    });

    Route::controller(IngredientController::class)->prefix("ingredient")->group(function(){
        Route::get('/', "index")->name("ingredients.index");
        Route::post('/store', "store")->name("ingredients.store");
        Route::put('/update/{id}', "update")->name("ingredients.update");
        Route::delete('/destroy/{id}', "destroy")->name("ingredients.destroy");
    });

    Route::controller(MediaController::class)->prefix("media")->group(function(){
        Route::get('/', "index")->name("media.index");
    });

    Route::controller(DataController::class)->prefix("data")->group(function(){
        Route::get('/', "index")->name("data.index");
    });

    Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");
});

require __DIR__.'/auth.php';
