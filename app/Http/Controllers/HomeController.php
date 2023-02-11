<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function nospoduits()
    {
        return view('nos-poduits');
    }
    public function apropos()
    {
        return view('a-propos');
    }
    

}


