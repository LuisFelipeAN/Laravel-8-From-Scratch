<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){
        return view('post.index',[
            'posts'=>    Post::latest()->filter(
                request(['search','category','author'])
            )->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post.show',[
            'post'=>$post ]);
    }


  
}
