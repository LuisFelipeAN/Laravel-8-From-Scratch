<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostCommentController;

use App\Services\Newsletter;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AdminPostController;
use GuzzleHttp\Middleware;

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

Route::get('/', [PostController::class,'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class,'show']);

Route::post('/posts/{post:slug}/comments', [PostCommentController::class,'store'])->middleware('auth');

Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionController::class,'create'])->middleware('guest');
Route::post('sessions',[SessionController::class,'store'])->middleware('guest');

Route::post('logout',[SessionController::class,'destroy'])->middleware('auth');

Route::post('newsletter',NewsletterController::class);

//index, show, create, store, edit, update, destroy
Route::middleware('can:admin')->group(function(){
    Route::get('admin/posts/create',[AdminPostController::class,'create']);
    Route::post('admin/posts',[AdminPostController::class,'store']);
    Route::get('admin/posts',[AdminPostController::class,'index']);
    Route::get('admin/posts/{post}/edit',[AdminPostController::class,'edit']);
    Route::patch('admin/posts/{post}',[AdminPostController::class,'update']);
    Route::delete('admin/posts/{post}',[AdminPostController::class,'destroy']);
});
