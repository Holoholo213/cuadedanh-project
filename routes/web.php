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
Route::prefix('/category')->group(function () {
    Route::get('/', [CategoryController::class, "index"])->name("category.index");
    Route::get('/store', [CategoryController::class, "store"])->name("category.store");
    Route::get('/update/{id}', [CategoryController::class, "update"])->name("category.update");
    Route::get('/destroy/{id}', [CategoryController::class, "destroy"])->name("category.destroy");
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
Route::prefix('/post')->group(function () {
    Route::get('/', [PostController::class, "index"])->name("post.index");
    Route::get('/detail/{id}', [PostController::class, "show"])->name("post.detail");
    Route::get('/create', [PostController::class, "create"])->name("post.create");
    Route::post('/store', [PostController::class, "store"])->name("post.store");
});

Route::get('/publish', [DashboardController::class, "publish"])->name("post.publish");
Route::get('/hiding', [DashboardController::class, "hiding"])->name("post.hiding");
Route::get('/favorite', [DashboardController::class, "favorite"])->name("post.favorite");

Route::get('/play', [PlaygroundController::class, 'index'])->name("play.index");