<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function login(){

        return view('mobile.user.user-login');

    }

    public function register(){

        return view('mobile.user.user-register');

    }

}
