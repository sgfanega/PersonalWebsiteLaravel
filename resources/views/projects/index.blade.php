@extends('layouts.app')

@section('content')
<div class="container d-flex">
    <div class="row">
        @if(count($projects) > 0)
            @foreach($projects as $project)
                <div class="container d-flex projects">
                    <a target="_blank" href="//{{$project->link}}">
                        <img src="/storage/logo_images/{{$project->language}}.png" alt="{{$project->language}} Logo" class="">
                    </a>
                    <div class="container d-flex justify-content-center align-content-center projects-text">
                        <a target="_blank" href="//{{$project->link}}">
                            <h3>{{$project->title}}</h3>
                        </a>
                        <p>{{$project->description}}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection