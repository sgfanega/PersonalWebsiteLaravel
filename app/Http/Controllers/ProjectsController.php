<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Project;
use DB;

class ProjectsController extends Controller
{
    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['index']]);
    }

    /**
     * Display a listing of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::select('SELECT * FROM projects');

        return view('projects.index')->with('projects', $projects);
    }
    
    /**
     * Show the form for creating a new resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in database
     * 
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'language'=>'required',
            'link'=>'required',
            'description'=>'required'
        ]);

        $project = new Project;
        $project->title = $request->input('title');
        $project->language = $request->input('language');
        $project->link = $request->input('link');
        $project->description = $request->input('description');
        $project->save();

        return redirect('/projects')->with('success', 'Project Created');
    }
}
