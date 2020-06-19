@extends('layouts.app')

@section('content')
<div class="container">
        @if(!Auth::guest())
            @if(Auth::user()->id == 1)
                <a href="/projects/create" class="btn btn-success text-center">Create</a>
                <hr>
            @endif
        @endif
        @if(count($projects) > 0)
            @foreach($projects as $project)
                <div class="container d-flex projects">
                    <a target="_blank" href="//{{$project->link}}">
                        <img src="/storage/logo_images/{{$project->language}}.png" alt="{{$project->language}} Logo">
                    </a>
                    <div class="container d-flex justify-content-center align-content-center projects-text">
                        <a target="_blank" href="//{{$project->link}}">
                            <h3>{{$project->title}}</h3>
                        </a>
                        <p>{{$project->description}}</p>
                    </div>
                    @if(!Auth::guest())
                        @if(Auth::user()->id == 1)
                        <div class="row">
                            <div class="col d-flex justify-content-end align-items-center">
                                <a href="/projects/{{$project->id}}/edit" class="btn btn-primary text-center">Edit</a>
                            </div>
                        </div>
                        @endif
                    @endif
                </div>
            @endforeach
        @endif
</div>
@endsection