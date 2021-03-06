@extends('layouts.admin')

@section('content')
	
    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $announcement->title }} </h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('announcement.index')}}">Back</a>
	    </div>

<table class="table table-bordered">
    <tr>
	<th>Title</th>
	<th>Photo</th>
	<th>Text</th>
	<th>Category</th>
	<th>Created</th>
    </tr>
    <tr>
	<td>{{$announcement->title}}</td>
	<td><img class="announceImgIndex" src="{{ asset('public/uploads/announcement/'.$announcement->image)}}"></td>
	<td>{{$announcement->text}}</td>
	<td>{{$announcement->category}}</td>
	<td>{{$announcement->created_at}}</td>
    <tr>
</table>
    
{!! Form::close() !!}
@endsection