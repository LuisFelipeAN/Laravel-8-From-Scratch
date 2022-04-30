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
use Dotenv\Exception\ValidationException;

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
//index, show, create, store, edit, update, destroy
Route::post('/posts/{post:slug}/comments', [PostCommentController::class,'store'])->middleware('auth');

Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionController::class,'create'])->middleware('guest');
Route::post('sessions',[SessionController::class,'store'])->middleware('guest');

Route::post('logout',[SessionController::class,'destroy'])->middleware('auth');

Route::post('newsletter',function(){
    request()->validate(['email'=>'required|email']);
    $mailchimp = new MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us18'
    ]);
    try{
        $response = $mailchimp->lists->addListMember('c8f0ee1df3',[
            'email_address'=>request('email'),
            'status'=>'subscribed'
        ]);
    } catch (Exception $e) {
        throw Illuminate\Validation\ValidationException::withMessages([
            'email'=>'This email could no be added to our newsleter.'
        ]);
    }
    
    return redirect('/')->with('success','You are now signed up for our news letter.');
});