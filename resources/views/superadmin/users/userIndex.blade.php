@extends('layouts.admin') 

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1 class="pageH1">Users</h1>
    <div class="pull-right">
	<a class="btn btn-primary createButton " href="{{ route('users.create') }}">Add User</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
	    <th>Email</th>
	    <th>Group</th>   
            <th width="280px">Action</th>
        </tr>
    @foreach ($users as $key => $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
	<td>{{ $user->email }}</td>
	<td></td>
        <td>
            <a class="btn btn-info " href="{{ route('users.show',$user->id) }}">Show User</a>
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit User</a>
    
	    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline','class'=>'confirm']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $users->render() !!}


@endsection