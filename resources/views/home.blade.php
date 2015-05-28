@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!
				</div>
				<ul>
				@forelse (Auth::user()->devicesOwned() as $owned)
					<li>{{ $owned->description }}</li>
				@empty
					<p>No devices</p>
				@endforelse
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
