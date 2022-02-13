<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PlaygroundController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('index');
});

Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");
Route::prefix('/data')->group(function () {
    Route::get('/', [DataController::class, "index"])->name("data.index");
});

Route::controller(CategoryController::class)->prefix("category")->group(function(){
    Route::get('/', "index")->name("category.index");
    Route::get('/{id}/{slug}', "show")->name("category.detail");
    Route::post('/store', "store")->name("category.store");
    Route::put('/update/{id}', "update")->name("category.update");
    Route::delete('/destroy/{id}', "destroy")->name("category.destroy");
});

Route::prefix('/tags')->group(function () {
    Route::get('/', [TagController::class, "index"])->name("tags.index");
});
Route::prefix('/ingredients')->group(function () {
    Route::get('/', [IngredientController::class, "index"])->name("ingredients.index");
});
Route::prefix('/media')->group(function () {
    Route::get('/', [MediaController::class, "index"])->name("media.index");
});

Route::controller(PostController::class)->prefix("post")->group(function(){
    Route::get('/', "index")->name("post.index");
    Route::get('/detail/{id}/{slug}', "show")->name("post.detail");
    Route::get('/create', "create")->name("post.create");
    Route::post('/store', "store")->name("post.store");
    Route::get('/edit/{id}', "edit")->name("post.edit");
    Route::post('/update/{id}', "update")->name("post.update");
    Route::delete('destroy/{id}', "destroy")->name("post.destroy");
});

Route::get('/play', [PlaygroundController::class, 'index'])->name("play.index");