@extends('customer.profile.layout')

@section('profile-content')
<div class="row">
	<div class="nav col-md-3 flex-column nav-pills" role="tablist" aria-orientation="vertical">
		<?php
		$menus = ['Riwayat', 'Top Up'];
		?>
		@foreach($menus as $i=>$menu)
		<a class="nav-link {{$i==0?'active':''}}" id="v-{{$menu}}-tab" data-toggle="pill" href="#v-{{$menu}}" role="tab" aria-controls="v-{{$menu}}" aria-selected="{{$i==0?'true':''}}">{{$menu}}</a>
		@endforeach
	</div>

	<div class="col-md-9 tab-content">
		<div class="tab-pane fade show active" id="v-{{$menus[0]}}" role="tabpanel" aria-labelledby="v-pills-{{$menus[0]}}-tab">
			Riwayat
		</div>
		<div class="tab-pane fade" id="v-{{$menus[1]}}" role="tabpanel" aria-labelledby="v-pills-{{$menus[1]}}-tab">
			Top Up
		</div>
	</div>
</div>
@endsection