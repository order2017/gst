<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function articleTypeList() {

        return view('admin.type-list');

    }

    public function articleTypeInsert() {

        return view('admin.type-insert');

    }
}
