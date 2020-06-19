@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/projects" class="btn btn-dark">Back</a>
        <hr>
        <h1>Edit Project</h1>
        {!! Form::open(['action'=>['ProjectsController@update', $project->id], 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $project->title, ['class'=>'form-control', 'placeholder'=>'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('language', 'Language')}}
                <br>
                {{Form::select('language', ['CSharp'=>'CSharp', 'PHP'=>'PHP', 'Java'=>'Java', 'Python'=>'Python', 'NoLogo'=>'Other'], $project->language)}}
            </div>
            <div class="form-group">
                {{Form::label('link', 'Link')}}
                {{Form::text('link', $project->link, ['class'=>'form-control', 'placeholder'=>'Link'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', $project->description, ['class'=>'form-control', 'placeholder'=>'Description'])}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
        {!! Form::close() !!}
    </div>
@endsection