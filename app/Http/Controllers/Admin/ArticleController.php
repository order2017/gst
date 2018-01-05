<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index() {

        return view('admin.article-list');

    }

    public function articleInsert() {

        return view('admin.article-insert');

    }

    public function articleInsertStore(Request $request) {

        dd($request->all());

    }
}
