@extends('layouts.admin')


@section('content')

                <h1 class="pageH1">Add New Announce</h2>
                <a class="btn btn-primary createButton" href="{{route('announcement.index') }}">Back</a>
        


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


    {!! Form::open(array('route' => 'announcement.store','method'=>'POST','files' => true)) !!}
    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {!! Form::text('title', null, array('class' => 'form-control')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Photo:</strong>
	        {!! Form::file('image', array('files' => true, 'class' => 'form-control')) !!}
	    </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Text:</strong>
                {!! Form::textarea('text', null, array('class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                {!! Form::select('category',['home'=>'Home','products'=>'Products','services'=>'Services'], array('class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary pull-left">Submit</button>
        </div>


    </div>
    {!! Form::close() !!}


@endsection