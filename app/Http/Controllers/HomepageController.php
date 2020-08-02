<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Homepage;
use DB;

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
     * Show the index for homepage
     * 
     * @return \Illuminate\Htpp\Response
     */
    public function index()
    {
        return view('homepage.index');
    }
}
