<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
        return view('session.create');
    }

    public function store(){
        $attributes = request()->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required'
        ]);

        if(!auth()->attempt($attributes)){
           //auth failed
            return back()->withInput()->withErrors(['email'=> 'Your provided credentials could not be verified.']);
        }
        
        session()->regenerate();
        return redirect('/')->with('success','Welcome Back!');
    
    }
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','Goodbye!');
    }


}
