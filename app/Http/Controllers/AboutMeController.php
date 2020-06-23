<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;
use App\AboutMe;
use DB;

class AboutMeController extends Controller
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
        $aboutme = DB::select('SELECT * FROM about_mes');

        return view('aboutme.index')->with('aboutme', $aboutme[0]);
    }

    /**
     * Show the form for editing the specified resource
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutme = aboutme::find($id);

        if (auth()->user()->id !== 1) {
            return redirect('/')->with('error', 'Unauthorized User.');
        }

        return view('aboutme.edit')->with('aboutme', $aboutme);
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
            'portrait_image' => 'nullable|image|max:1999',
            'paragraph'=>'required'
        ]);

        // Handle the file upload
        if ($request->hasFile('portrait_image')) {
            // Get the filename with extension
            $fileNameWithExt = $request->file('portrait_image')->getClientOriginalName();
            // Get filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get extension
            $fileExtension = $request->file('portrait_image')->getClientOriginalExtension();
            // Filename to store - Adding time incase files have the same name
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtension;
            // Upload image
            $path = $request->file('portrait_image')->storeAs('public/portrait_image', $fileNameToStore);
        }

        $aboutme = AboutMe::find($id);
        // Checks if a new file has been selected & deletes old file from storage
        if($request->hasFile('portrait_image')) {
            Storage::delete('public/portrait_image/' . $aboutme->portrait_image);
            $aboutme->portrait_image = $fileNameToStore;
        }
        $aboutme->paragraph = $request->input('paragraph');
        $aboutme->save();

        return redirect('/aboutme')->with('success', 'About Me Updated');
    }
}
