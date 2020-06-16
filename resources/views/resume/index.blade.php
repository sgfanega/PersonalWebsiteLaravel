@extends('layouts.app')

@section('content')
@if(!empty($resume))
<div class="container resume">
    <h1 class="">{{$resume->pdf_source}}</h1>
</div>
@endif
@endsection
