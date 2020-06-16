<?php

namespace App\Http\Controllers;

use App\Resume;
use DB;
use Illuminate\Http\Request;

class ResumeController extends Controller
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
        $resume = DB::select('SELECT * FROM resumes');

        return view('resume.index')->with('resume', $resume[0]);
    }
    
}
