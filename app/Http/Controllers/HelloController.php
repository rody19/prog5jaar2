<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        $text = "Hello Cruel World";
        return view('hello_index', ['text' => $text]);
    }
}
