@extends('layouts.admin') 

@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1 class="pageH1">Corals</h1>
  @if (auth()->check())
    @if (auth()->user()->isAdmin())
    <div class="pull-right">
	<a class="btn btn-primary createButton " href="{{ route('corals.create') }}">Add Coral</a>
    </div>
        <div class="pull-right" style="padding-right:5px;">
        <a class="btn btn-primary createButton " href="{{ route('coralExcelIndex') }}">Import/Export Corals</a>
    </div>
     @endif
  @endif
    <table class="table table-bordered">
        <tr>
            <th>Item Number</th>
            <th>Name</th>
            <th>Photo</th>
	    <th>Plastic Quantity</th>
            <th>Cost Price</th>
            <th>Prduct Weight</th>
	    <th>Retail Price</th>
            <th>Wholesale Price</th>
            <th>Barcode</th>
	    <th>Summary Quantity</th>
            <th>Description</th> 
            <th width="280px">Action</th>
        </tr>
    @foreach ($corals as $coral)
    <tr>
        <td>{{ $coral->item_number }}</td>
        <td>{{ $coral->name }}</td>
    	<td><img src="{{asset('public/uploads/coral/'.$coral->photo) }}"></td>
	<td>{{ $coral->plastic_quantity }}</td>
        <td>{{ $coral->cost_price}}</td>
        <td>{{ $coral->product_weight}}</td>
	<td>{{ $coral->retail_price}}</td>
        <td>{{ $coral->wholesale_price }}</td>
        <td>{{ $coral->barcode }}</td>
	    @foreach($coral->coralColors as $cc)
	<td>{{ $cc->summary }}</td> 
	    @endforeach
	<td>{{str_limit($coral->description) }}</td> 

        <td>
    @if (auth()->check())
	@if (auth()->user()->isAdmin())
	    <a class="btn btn-info " href="{{ route('corals.show',$coral->id) }}">Show Coral</a>
	    <a class="btn btn-primary" href="{{ route('corals.edit',$coral->id) }}">Edit Coral</a>
	    <a class="btn btn-primary" href="{{ route('coralUpdateQuantity',$coral->id) }}">Update Quntity</a>
    	    {!! Form::open(['method' => 'DELETE','route' => ['corals.destroy', $coral->id],'style'=>'display:inline','class'=>'confirm']) !!}
    	    {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
    	    {!! Form::close() !!}
	@else
    	    <a class="btn btn-info " href="{{ route('corals.show',$coral->id) }}">Show Coral</a>
	@endif
    @endif
        
	
	    
        </td>
    </tr>
    @endforeach
    </table>


    {!! $corals->render() !!}


@endsection