<?php

namespace App\Services;
use App\Services\INewsletter;

class ConvertKitNewsletter implements INewsletter
{
    public function subscribe(string $email, string $list = null){
        //Subscibe the user wthi ConvertKitAPI
    }
    public function unSubscibe(string $email){
         //Unsubscibe the user wthi ConvertKitAPI
    }
}