@extends('layouts.admin') 

@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1 class="pageH1">Announcements</h1>
    <div class="pull-right">
	<a class="btn btn-primary createButton " href="{{ route('announcement.create') }}">Add Announce</a>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Photo</th>
            <th>Text</th>
	    <th>Category</th>
            <th>Created</th>
                <th width="280px">Action</th>
        </tr>
    @foreach ($announcements as $announce)
    <tr>
        <td>{{ $announce->title}}</td>
        <td><img class="announceImgIndex" src="{{asset('public/uploads/announcement/'.$announce->image)}}"></td>
    	<td>{{str_limit($announce->text,50)}}</td>
	<td>{{ $announce->category }}</td>
	<td>{{ $announce->created_at }}</td>

        <td>
	    <a class="btn btn-info " href="{{ route('announcement.show',$announce->id) }}">Show Announce</a>
	    <a class="btn btn-primary" href="{{ route('announcement.edit',$announce->id) }}">Edit Announce</a>
    	    {!! Form::open(['method' => 'DELETE','route' => ['announcement.destroy', $announce->id],'style'=>'display:inline','class'=>'confirm']) !!}
    	    {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
    	    {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $announcements->render() !!}


@endsection