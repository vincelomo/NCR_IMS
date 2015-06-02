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
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="navbar-brand">Filter: </div>
						</div>
					
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Owner <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										@if(Auth::check())
										<li><a href="#">Me</a></li>
										@endif
										@foreach($ownerList as $owner)
										<li><a href=""> {{ $owner->name }} </a></li>
										@endforeach
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Type <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										@foreach($types as $type)
										<li><a href="#">{{ $type->name }}</a></li>
										@endforeach
									</ul>
								</li>
								<div class="btn-group" data-toggle="buttons">
								  <label class="btn btn-default navbar-btn">
								    <input type="checkbox" autocomplete="off"> Unborrowed
								  </label>
								</div>
							</ul>
						</div>
					</div>
				</nav>
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