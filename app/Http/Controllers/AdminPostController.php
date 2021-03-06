<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index',[
            'posts'=>Post::paginate(50)
        ]);
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(){
        $atttributes = $this->validatePost();
        $atttributes['user_id']=auth()->id();
        $atttributes['thumbnail']=request()->file('thumbnail')->store('thumbnails');
        Post::create($atttributes);
        return redirect('/');
    }

    public function edit(Post $post){
        return view("admin.posts.edit",[
            'post'=>$post
        ]);
    }

    public function update(Post $post){
        $atttributes = $this->validatePost( $post);
        if(isset( $atttributes['thumbnail'])){
            $atttributes['thumbnail']=request()->file('thumbnail')->store('thumbnails');
        }
        $post->update($atttributes);
        return back()->with('success','Post Updated');
    }

    public function destroy(Post $post){
        $post->delete();
        return back()->with('success','Post Deleted!');
    }

    protected function validatePost(?Post $post=null){
        $post??=new Post();
        return request()->validate([
            'title' =>'required',
            'thumbnail'=> $post->exists ? 'image':['required','image'],
            'exerpt' =>'required',
            'body' =>'required',
            'category_id' => ['required',Rule::exists('categories','id')],
            'slug' => ['required', Rule::unique('posts','slug')->ignore($post)]
        ]);
    }
}
