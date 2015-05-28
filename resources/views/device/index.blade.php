@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">All Devices</div>
				<div class="list-group">
					@forelse ($devices as $device)
						<a 	href="{{ url('/device/show/'.$device->id) }}" 
							class="list-group-item {{ $device->is_borrowed ? 'list-group-item-danger' : 'list-group-item-success' }}">
							{{ $device->description }}
						</a>
					@empty
						<p>No devices</p>
					@endforelse
				</div>
			</div>
		</div>
	</div>
</div>
@endsection