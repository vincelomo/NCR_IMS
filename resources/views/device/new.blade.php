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
							<div class="col-md-6">
								@if( isset($types) && count($types) )
								<input type="hidden" name="type" id="type" value="{{ old('type') }}">
								<div class="input-group">
									<div class="input-group-btn">
										<button type="button" class="btn btn-default dropdown-toggle dropdown-select-btn" data-toggle="dropdown" aria-expanded="false">Select type <span class="caret"></span></button>
										<ul class="dropdown-menu" role="menu">
										@foreach( $types as $type )
											<li><a href="#" class="dropdown-select" data-value="{{ $type->id }}">{{ $type->name }}</a></li>
										@endforeach
											<li><a href="#" class="dropdown-select" data-value="other"> Other </a></li>
										</ul>
									</div>
									<input type="text" class="form-control" aria-label="Specify" name="specify" id="specify" placeholder="Specify">
								</div>
								@else
								<input class="form-control" type="text" name="type" value="{{ old('type') }}">
								<input type="hidden" name="specify" value="">
								@endif
							</div>
							<style type="text/css">
								#specify {
									display: none;
								}
								.btn .caret {
									margin-left: 5px;
								}
							</style>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
							  	<button type="submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$(function(){
	$('.dropdown-select').click(function(e){
		var v = $(this).data('value');
		$('#type').val(v);
		$('.dropdown-select-btn').html($(this).html()+'<span class="caret"></span>')
		if(v != 'other'){
			$('#specify').hide();
		} else {
			$('#specify').show();
		}

		e.preventDefault();
	});
});
</script>
@endsection