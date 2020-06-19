@extends('layouts.app')

@section('content')
    @if(!empty($resume))
    <div class="flex-container d-flex justify-content-center align-items-center resume">
        <h1 class="display-6 text-center">Résumé</h1>
        @if(!Auth::guest())
            @if(Auth::user()->id == 1)
            <div class="row">
                <div class="col">
                    <a href="/resume/{{$resume->id}}/edit" class="btn btn-primary text-center">Edit</a>
                </div>
            </div>
            @endif
        @endif
        <hr>
        <div class="embed-responsive embed-responsive-1by1">
            <iframe class="embied-responsive-item" src="/storage/pdf_sources/{{$resume->pdf_source}}" title="Resume"></iframe>
        </div>
        <p>If you cannont see the PDF, click <a href="/storage/pdf_sources/{{$resume->pdf_source}}.pdf" download>here</a></p> 
    </div>
    @endif
@endsection
