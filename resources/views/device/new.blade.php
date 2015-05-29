@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Create new device</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/device/new') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Device code</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="device-code" value="{{ old('device-code') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="description" value="{{ old('description') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Device type</label>
							<div class="col-md-3">
								@if( isset($types) )
								<select class="form-control" name="type" value="{{ old('type') }}">
									<!--<option value=""> device type </option>-->
									@foreach( $types as $type )
									<option value="{{ $type->id }}"> {{ $type->name }} </option>
									@endforeach
									<option value="other"> Other </option>
								</select>
								<input class="form-control" type="text" id="othertype" name="othertype" value="{{ old('type') }}">
								@else
								<input class="form-control" type="text" name="type" value="{{ old('type') }}">
								@endif
							</div>
							<style type="text/css">
								#othertype {
									display: none;
								}
							</style>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection