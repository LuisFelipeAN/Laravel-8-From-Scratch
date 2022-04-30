<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use App\Services\Newsletter;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter){
        request()->validate(['email'=>'required|email']);
        try{
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email'=>'This email could no be added to our newsleter.'
            ]);
        }
        
        return redirect('/')->with('success','You are now signed up for our news letter.');
    }
}
