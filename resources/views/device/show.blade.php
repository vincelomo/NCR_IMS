@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $device->code }}</div>
				<div class="panel-body">
					<p> {{ $device->description }} </p>
					@if ( $device->is_borrowed )
					<p>This device is borrowed</p>
					@else
					<p>This device is not borrowed</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection