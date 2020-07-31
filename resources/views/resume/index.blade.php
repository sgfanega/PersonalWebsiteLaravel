@extends('layouts.default')
@section('content')
    @if(!empty($resume))
    <div class="flex-container d-flex resume my-3">
        <h1 class="display-6 text-center text-white">Résumé</h1>
        @if(!Auth::guest())
            @if(Auth::user()->id == 1)
            <div class="row mb-4">
                <div class="col">
                    <a href="/resume/{{$resume->id}}/edit" class="btn btn-primary text-center">Edit</a>
                </div>
            </div>
            @endif
        @endif
        <hr>
        <div class="embed-responsive embed-responsive-1by1">
            <object class="embed-responsive-item" data="/storage/pdf_sources/{{$resume->pdf_source}}" type="application/pdf"
                internalinstsanceid="9" title="Résumé">
                <p> Your broswer isn't supporting embedded pdf files. You can download the file 
                    <a href="/storage/pdf_sources/{{$resume->pdf_source}}">here</a>.</p>
            </object>
        </div>
    </div>
    @endif
@endsection
