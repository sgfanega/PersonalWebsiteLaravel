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
        $homepage = DB::select('SELECT * FROM homepages');

        if (!$homepage) {
            $homepage = Homepage();
            $homepage->name = "Steve Fanega";
            $homepage->job_title = "Computer Scientist";

            return view('homepage.index')->with('homepage', $homepage);
        } 

        return view('homepage.index')->with('homepage', $homepage[0]);
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

        if (auth()->user()->id !== 1) {
            return redirect('/')->with('error', 'Unauthorized User.');
        }

        return view('homepage.edit')->with('homepage', $homepage);
    }

    /**
     * Update the specified resource in storage
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'job_title'=>'required',
            'background_image'=> 'image|nullable|max:1999'
        ]);

        // Handle the file upload
        if ($request->hasFile('background_image')) {
            // Get the filename with extension
            $fileNameWithExt = $request->file('background_image')->getClientOriginalName();
            // Get filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get extension
            $fileExtension = $request->file('background_image')->getClientOrOriginalExtension();
            // Filename to store - Adding time incase files have the same name
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtension;
            // Upload image
            $path = $request->file('background_image')->storeAs('public/background_image', $fileNameToStore);
        }

        $homepage = Homepage::find($id);
        $homepage->name = $request->input('name');
        $homepage->job_title = $request->input('job_title');
        // $homepage->background_image = $fileNameToStore;
        $homepage->save();

        return redirect('/')->with('success', 'Homepage Updated');
    }
}
