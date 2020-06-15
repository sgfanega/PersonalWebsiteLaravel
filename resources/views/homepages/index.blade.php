@extends('layouts.app')
@section('content')
<div class="container mt-5 homepage">
    @if(count($homepages) > 0)
        @foreach($homepages as $homepage)
            <div class="h-100 row d-flex align-items-center">
                <div class="col d-flex justify-content-center">
                    <h1 class="display-3">{{$homepage->name}}</h1>
                </div>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col d-flex justify-content-center">
                    <p class="lead">{{$homepage->job_title}}</p>
                </div>
            </div>
            @if(!Auth::guest())
                @if(Auth::user()->id == 1)
                <div class="row d-flex align-items-center">
                    <div class="col d-flex justify-content-center">
                        <a href="/homepages/{{$homepage->id}}/edit" class="btn btn-primary">Edit</a>
                    </div>
                </div>
                @endif
            @endif
        @endforeach
    @endif
</div>
@endsection