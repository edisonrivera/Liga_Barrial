<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function welcome(){
        return view('welcome');
    }

    function createPost(){
        return view('post-form');
    }
}
