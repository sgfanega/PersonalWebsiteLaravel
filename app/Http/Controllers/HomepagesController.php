<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homepage;

class HomepageController extends Controller
{
    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display the homepage
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homepage.index');
    }
}
