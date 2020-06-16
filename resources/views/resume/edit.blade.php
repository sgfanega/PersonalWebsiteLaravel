@extends('layouts.app')

@section('content')
    <h1>Edit Résumé</h1>
    {!! Form::open(['action'=>['ResumeController@update', $resume->id], 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::file('pdf_source')}}
    </div>
    <br/>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
    {!! Form::close() !!}
@endsection
