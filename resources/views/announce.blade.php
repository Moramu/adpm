@extends('layouts.simple')

@section('content')

	    <div id="heading">
	        <h1 class="pageH1">Announce</h1>
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
    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('home')}}">Back</a>
	    </div>
    
{!! Form::close() !!}
@endsection