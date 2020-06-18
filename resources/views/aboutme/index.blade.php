@extends('layouts.app')

@section('content')
@if(!empty($aboutme))
<div class="flex-container d-flex justify-content-center align-items-center aboutme">
    <h1 class="display-6 text-center">About Me</h1>
    @if(!Auth::guest())
        @if(Auth::user()->id == 1)
        <div class="row">
            <div class="col">
                <a href="/aboutme/{{$aboutme->id}}/edit" class="btn btn-primary text-center">Edit</a>
            </div>
        </div>
        @endif
    @endif
    <hr>
    <div class="row">
        <div class="col">
            <img src="/storage/portrait_image/{{$aboutme->portrait_image}}" alt="Self-Portrait" class="rounded img-thumbnail">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p class="lead">{{$aboutme->paragraph}}</p>
        </div>
    </div>
</div>
@endif
@endsection
