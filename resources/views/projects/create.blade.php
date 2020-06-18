@extends('layouts.app')

@section('content')
    <h1>Create Project</h1>
    {!! Form::open(['action'=>'ProjectsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('language', 'Language')}}
        <br>
        {{Form::select('language', ['CSharp'=>'CSharp', 'PHP'=>'PHP', 'Java'=>'Java', 'Python'=>'Python', 'Other'=>'NoLogo'], 'Other')}}
    </div>
    <div class="form-group">
        {{Form::label('link', 'Link')}}
        {{Form::text('link', '', ['class'=>'form-control', 'placeholder'=>'Link'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', '', ['class'=>'form-control', 'placeholder'=>'Description'])}}
    </div>
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection