@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Devices</div>
				<div class="panel-body">
					@if (Auth::check())
						<a href="/device/new" class="btn btn-default">New Device</a>
					@endif
				</div>
				@if (isset($devices))
				<table class="table table-condensed">
					<thead><tr>
						<th> Code </th>
						<th> Type </th>
						<th> Description </th>
						<th> Owner </th>
						<th></th>
					</tr></thead>
				@foreach ( $devices as $device ) 
					<tr class="{{ $device->is_borrowed ? 'danger' : 'success' }}">
						<td data-label="Code"> <span>{{ $device->code }} </span></td>
						<td data-label="Type"> <span>{{ $device->typeName() }} </span></td>
						<td data-label="Description"> <span>{{ $device->description }} </span></td>
						<td data-label="Owner"> <span>{{ $device->owner->name }} </span></td>
						<td>
							<a href="{{ url('/device/show/'.$device->id) }}" class="btn btn-primary">View</a>
							@if (Auth::check())
							<a href="{{ url('device/edit/'.$device->id) }}" class="btn btn-warning">Edit</a>
							@endif
						</td>
					</tr>
				@endforeach
				</table>
				<center>{!! $devices->render() !!}</center>
				@endif
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	@media screen and (max-width: 600px) {

	    table {
	      border: 0;
	    }

	    table thead {
	      display: none;
	    }

	    table tr {
	      margin-bottom: 10px;
	      display: block;
	      border-bottom: 2px solid #ddd;
	    }

	    table td {
	      display: block;
	      text-align: left;
	      font-size: 13px;
	      /*border-bottom: 1px dotted #ccc;*/
	      border: 0 !important;
	      min-height: 100%;
	    }

	    table td:last-child {
	      border-bottom: 0;
	    }

	    table td:before {
	      content: attr(data-label);
	      display: inline-block;
	      text-transform: uppercase;
	      font-weight: bold;
	      width: 45%;
	    }

	    table td span {
	    	display: inline-block;
	    	width: 45%
	    }
	}
	</style>
@endsection