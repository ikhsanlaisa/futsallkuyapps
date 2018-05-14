@extends('customer.layout')
@section('title')
Confirm Join &middot; #{{$booking->id}}
@endsection
@section('style')
@endsection
@section('content')
<div class="row">
	<div class="col-md-5 offset-md-4">
		@include('content_joining')
	</div>
</div>
@endsection