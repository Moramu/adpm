@extends('layouts.admin')



  @if (session('status'))
    <div class="alert alert-success">
	{{ session('status') }}
    </div>
  @endif
@section('content')

 
    <div class="containerAnnounce">
    @foreach($announcements as $an)
    <div class="announce">
        <div class="announceHeader">
	<div class="announceTitle">
	    {{$an->title}}
	</div>
	<div class="announceDate">
	    {{$an->created_at}}
	</div>
        </div>
        <div class="announceContent">
	<img class="announceImage" src="public/uploads/announcement/{{$an->image}}">
        </div>
        <div class="announceFooter">
	<div class="announceText">
	{{ str_limit($an->text,500)}}
	</div>
	<div class="announceRead">
	     <a class="btn btn-primary-my" href="{{route('announce',$an->id)}}">Read..</a>
	</div>
        </div>
    </div>
    @endforeach
    </div>

{{$announcements->render()}}    

@endsection
