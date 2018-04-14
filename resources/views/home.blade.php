@extends('layouts.simple')



@section('content')

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
    <div id="heading">
	<h1 class="pageH1">Home</h1>
    </div>

    <div class="homeAnnounce">
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
		     <button class="btn btn-primary-my dropdown-toggle" type="button">Read..</button>
		</div>
	    </div>
	</div>
	@endforeach
    </div>

{{$announcements->render()}}
@endsection
