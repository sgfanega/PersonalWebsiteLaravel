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

    /**
     * Show the form for editing the specified resource
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resume = Resume::find($id);

        if (auth()->user()->id !== 1) {
            return redirect('/')->with('error', 'Unauthorized User.');
        }

        return view('resume.edit')->with('resume', $resume);
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
            'pdf_source'=>'required|max:1999'
        ]);

        // Handle the file upload
        if($request->hasFile('pdf_source')) {
            // Get filename with extension
            $fileNameWithExt = $request->file('pdf_source')->getClientOriginalName();
            // Get filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get extension
            $fileExtension = $request->file('pdf_source')->getClientOriginalExtension();
            // Throws error if the extension is not .pdf
            if($fileExtension != 'pdf') {
                return redirect('/resume/' . $id . '/edit')->with('error', "File is not a PDF");
            }
            // Filename to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtension;
            // Upload the file
            $path = $request->file('pdf_source')->storeAs('public/pdf_sources', $fileNameToStore);
        }

        $resume = Resume::find($id);
        if($request->hasFile('pdf_source')) {
            $resume->pdf_source = $fileNameToStore;
        }
        $resume->save();

        return redirect('/resume')->with('success', 'Resume Updated');
    }
}
