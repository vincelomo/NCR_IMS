@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $device->code }}</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6 col-md-push-6">
							<h5>Type</h5>
							<p> {{ $device->typeName() }} </p>
							<h5>Description</h5>
							<p> {{ $device->description }} </p>
							@if( Auth::check() )
							<a class="btn btn-warning" href="{{ url('/device/edit/'.$device->id) }}">Edit</a>
							@endif
							@if ( $device->is_borrowed )
							<a class="btn btn-danger" href="#"> Device is currently borrowed </a>
							@else
							<a class="btn btn-primary" href="#">{{ Auth::check() ? 'Loan':'Borrow' }}</a>
							@endif
						</div>
						<div class="col-md-6 col-md-pull-6">
							<div id="qrcode" class="thumbnail"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="/js/qrcode.min.js"></script>
<script type="text/javascript">
(function(){
	new QRCode(document.getElementById('qrcode'),'{{ url('/device/show/'.$device->id) }}');
})();
</script>
<style type="text/css">
	#qrcode img {
		width: 100%;
		height: auto;
		max-width: 300px;
	}
</style>
@endsection