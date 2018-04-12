@extends('layouts.admin')
 

@section('content')

	    <div class="pull-left">
		<h1 class="pageH1">Edit Aquarium</h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-info createButton" href="{{route('aquariums.index') }}">Back</a>
	    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($aquarium, ['method' => 'PATCH','route' => ['aquariums.update', $aquarium],'files'=>'true']) !!}
    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Item Number:</strong>
                {!! Form::number('item_number', null, array('class' => 'form-control')) !!}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>List Price:</strong>
                {!! Form::number('list_price', null, array('class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Extended price:</strong>
                {!! Form::number('extended_price', null, array('class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>

	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Co Stock:</strong>
                {!! Form::number('co_stock', null, array('class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Provider:</strong>
                {!! Form::text('provider', null, array('class' => 'form-control')) !!}
            </div>
        </div>
	
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Retail Price:</strong>
                {!! Form::number('rtl_price', null, array('class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>

	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Wholesale Price:</strong>
                {!! Form::number('whl_price', null, array('class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::number('quantity', null, array('class' => 'form-control')) !!}
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary pull-left">Submit</button>
        </div>


    </div>
    {!! Form::close() !!}


@endsection