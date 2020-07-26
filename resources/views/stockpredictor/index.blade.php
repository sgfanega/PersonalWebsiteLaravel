@extends('layouts.default')
@section('content')
    <h1>Stock Predictor</h1>
    @if(!empty($chartjs))
        <div style="width:100%;">
            {!! $chartjs->render() !!}
        </div>
    @endif
    {!! Form::open(['action'=>['StockPredictorController@index'], 'method'=>'POST', 'enctype'=>'multipart'])!!}
        <div class="form-row">
            <div class="form-group col-md-6">
                {{Form::label('ticker_symbol', 'Ticker Symbol')}}
                {{Form::text('ticker_symbol', '' ,['class'=>'form-control', 'placeholder'=>'MSFT', 'minlength'=>1, 'maxlength'=>5])}}
            </div>
            <div class="form-group col-md-4">
                {{Form::label('forecast_days', 'Forecast Days')}}
                {{Form::selectRange('forecast_days', 1, 30, 30, ['class'=>'form-control'])}}
            </div>
            <div class="form-group col-md-2">
                {{Form::label('machine_learning_type', 'Machine Learning Type')}}
                {{form::select('machine_learning_type',
                [
                    'LR'=>'Linear Regression',
                    'SVM'=>'Support Machine Regression'
                ], null, ['class'=>'form-control', 'placeholder'=>'Pick a type...'])}}
            </div>
        </div>
        {{Form::hidden('_method', 'POST')}}
        {{Form::submit('Analyze', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection