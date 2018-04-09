@extends('layouts.admin')

@section('content')
    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $additive->name }} </h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('additives.index')}}">Back</a>
	    </div>

{!! Form::model($additive,['method'=>'POST'])!!} 
    	{!!Form::hidden('additive',$additive->id)!!}
<table class="table table-bordered">
    <tr>
	<th>Quantity</th>
    </tr>
    <tr>
	<td>{!!Form::number('quantity',null,array('class'=>'form-control'))!!}</td>
    <tr>

</table>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
{!! Form::close() !!}
@endsection