@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<div class="panel panel-primary">
				<div class="panel-heading">Devices Owned</div>
				<table class="table">
					<tr>
						<th>Code</th>
						<th>Type</th>
					</tr>
					@forelse ($owned as $device)
					<tr class="{{ $device->is_borrowed ? 'danger' : 'success' }}" >
						<th>{{ $device->code }}</th>
						<td>{{ $device->type }}</td>
					</tr>
					@empty
						<p>No devices owned</p>
					@endforelse
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
