<?php

namespace App\Services;

interface INewsletter
{
    public function subscribe(string $email, string $list = null);
    public function unSubscibe(string $email);
}