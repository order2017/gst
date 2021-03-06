<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {

        return view('mobile.index');

    }

    public function indexSy() {

        return view('mobile.index-sy');

    }

    public function indexSc() {

        return view('mobile.index-sc');

    }

    public function indexXx() {

        return view('mobile.details-xx');

    }

    public function indexS() {

        return view('mobile.details-sc');

    }
}
