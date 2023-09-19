<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class controllerjaar2 extends Controller
{
    //use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        return view('jaar2_index');
    }
}
