@extends('layouts.default')
@section('content')
<div class="flex-container d-flex justify-content-center align-items-center homepage">
    @if(!empty($homepage))
        <div class="row">
            <div class="col">
                <h1 class="display-3 text-center">{{$homepage->name}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="lead text-center">{{$homepage->job_title}}</p>
            </div>
        </div>
        @if(!Auth::guest())
            @if(Auth::user()->id == 1)
            <div class="row">
                <div class="col">
                    <a href="/homepage/{{$homepage->id}}/edit" class="btn btn-primary text-center">Edit</a>
                </div>
            </div>
            @endif
        @endif
    @endif
</div>
@endsection