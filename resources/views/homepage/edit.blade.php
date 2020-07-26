@extends('layouts.default')
@section('content')
    <h1>Edit Homepage</h1>
    {!! Form::open(['action'=>['HomepageController@update', $homepage->id], 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $homepage->name, ['class'=>'form-control', 'placeholder'=>'Jon Snow'])}}
    </div>
    <div class="form-group">
        {{Form::label('job_title', 'Job Title')}}
        {{Form::text('job_title', $homepage->job_title, ['class'=>'form-control', 'placeholder'=>'King of the North'])}}
    </div>
<!--    <div class="form-group">
        {{Form::file('job_title')}}
    </div> -->
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
    {!! Form::close() !!}
@endsection