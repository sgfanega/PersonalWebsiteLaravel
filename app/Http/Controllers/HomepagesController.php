<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Homepage;
use DB;

class HomepagesController extends Controller
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
     * Show the form for editing the specified resource
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homepage = Homepage::find($id);
        if (auth()->users()->id !== $homepage->user_id) {
            return redirect('/')->with('error', 'Unauthorized User.');
        }

        return view('homepages.edit')->with('homepage', $homepage);
    }
}
