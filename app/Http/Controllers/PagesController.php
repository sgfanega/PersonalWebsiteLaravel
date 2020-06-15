<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homepage;
use DB;

class PagesController extends Controller
{
    /**
     * The main page of the website
     */
    public function index()
    {
        $homepages = DB::select('SELECT * FROM homepages');
        
        return view('homepages.index')->with('homepages', $homepages);
    }
}
