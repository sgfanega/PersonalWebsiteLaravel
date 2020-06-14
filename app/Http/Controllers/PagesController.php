<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * The main page of the website
     */
    public function index()
    {
        return view('homepage.index');
    }
}
