<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // Welcome
    function welcome(){
        return view('welcome');
    }
}
