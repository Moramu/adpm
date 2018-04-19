@extends('layouts.admin')
 

@section('content')



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


	    <div class="pull-left">
		<h1 class="pageH1">Edit User - <b>{{$user->name}}</b></h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-info createButton" href="{{route('users.index') }}">Back</a>
	    </div>




    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user]]) !!}
    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::email('email', null, array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>New Password:</strong>
                {!! Form::password('password',array('class' => 'form-control')) !!}
            </div>
        </div>
	
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>New Password Repeat:</strong>
                {!! Form::password('password_repeat',array('class' => 'form-control')) !!}
            </div>
        </div>
	@foreach ($user->roles as $role)
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('role_id',$roles,$role->id,array('class' => 'form-control')) !!}
	    </div>
        </div>
	@endforeach	
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary pull-left">Submit</button>
        </div>


    </div>
    {!! Form::close() !!}


@endsection