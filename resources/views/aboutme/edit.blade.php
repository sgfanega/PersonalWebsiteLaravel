@extends('layouts.app')

@section('content')
    <h1>Edit About Me</h1>
    {!! Form::open(['action'=>['AboutMeController@update', $aboutme->id], 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::file('portrait_image')}}
    </div>
    <div class="form-group">
        {{Form::label('paragraph', 'Paragraph')}}
        {{Form::textarea('paragraph', $aboutme->paragraph, ['class'=>'form-control', 'placeholder'=>'Sample Text'])}}
    </div>
    <br/>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
    {!! Form::close() !!}
@endsection
