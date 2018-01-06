<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index() {

        return view('mobile.article-list');

    }

    public function details() {

        return view('mobile.article-details');

    }
}
