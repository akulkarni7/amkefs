@extends('app')
@section('content')
    <h1>Update Mutual Fund</h1>
    {!! Form::model($mutualfund,['method' => 'PATCH','route'=>['MutualFunds.update',$mutualfund->id]]) !!}
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
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop
