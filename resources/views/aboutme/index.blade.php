@extends('layouts.default')
@section('content')
@if(!empty($aboutme))
<div class="flex-container d-flex justify-content-center align-items-center my-3 aboutme">
    <h1 class="display-6 text-center text-white">About Me</h1>
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
    <div class="row my-3">
        <div class="col">
            <img src="{{ asset('/storage/portrait_image/'.$aboutme->portrait_image) }}" alt="Self-Portrait" class="rounded">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <p class="lead">{!! nl2br(e($aboutme->paragraph)) !!}</p>
        </div>
    </div>
</div>
@endif
@endsection
