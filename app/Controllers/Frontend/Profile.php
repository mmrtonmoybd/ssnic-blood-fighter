<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\User;

class Profile extends BaseController
{
    public function index()
    {
        //$user = new User();
        //var_dump(user()->firstname);
        return view('frontend/dashboard');
    }
}
