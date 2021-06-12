<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Register routes

//Get all posts
Route::get('posts', [PostController::class, 'getPosts']);

//Get all posts with Pagination
Route::get('posts/paginate', [PostController::class, 'paginatePosts']);

//Get Post By ID
Route::get('posts/{id}', [PostController::class, 'show']);

//Create Post
Route::post('posts/create', [PostController::class, 'create']);

//Update Post
Route::put('posts/{id}/update', [PostController::class, 'update']);

//Delete Post
Route::delete('posts/{id}/delete', [PostController::class, 'destroy']);

//Add comment to blog post
Route::post('posts/{post:id}/comment', [CommentController::class, 'addComment']);

//Get Comment on a post
Route::get('posts/{post:id}/comment', [CommentController::class, 'getComments']);