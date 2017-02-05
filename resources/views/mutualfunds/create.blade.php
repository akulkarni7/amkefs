@extends('app')
@section('content')
    <h1>Create New Fund</h1>
    {!! Form::open(['url' => 'mutualfunds']) !!}

    <div class="form-group">
        {!! Form::select('customer_id', $customers) !!}
    </div>

    <div class="form-group">
        {!! Form::label('fund name', 'Fund Name:') !!}
        {!! Form::text('fund name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fund asset', 'Fund Asset:') !!}
        {!! Form::text('fund asset',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('amount', 'Amount:') !!}
        {!! Form::text('amount',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('purchase_price', 'Purchase Price:') !!}
        {!! Form::text('purchase_price',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('purchased', 'Purchase Date:') !!}
        {!! Form::text('purchased',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop
