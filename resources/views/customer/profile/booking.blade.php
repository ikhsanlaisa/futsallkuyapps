@extends('customer.profile.layout')
@section('profile-content')
<div class="row">
	<div class="nav col-md-3 flex-column nav-pills" role="tablist" aria-orientation="vertical">
		<?php
		$menus = ['Terbaru', 'Rekomendasi', 'Riwayat'];
		?>
		@foreach($menus as $i=>$menu)
		<a class="nav-link {{$i==0?'active':''}}" id="v-{{$menu}}-tab" data-toggle="pill" href="#v-{{$menu}}" role="tab" aria-controls="v-{{$menu}}" aria-selected="{{$i==0?'true':''}}">{{$menu}}</a>
		@endforeach
	</div>

	<div class="col-md-9 tab-content">
		<div class="tab-pane fade show active" id="v-{{$menus[0]}}" role="tabpanel" aria-labelledby="v-pills-{{$menus[0]}}-tab">
			<table class="table table-striped booking-table">
				<thead>
				<tr>
					<th>Kode Booking</th>
					<th>Lapangan</th>
					<th>Jadwal</th>
					<th>Tarif</th>
					<th>Tipe Player</th>
					<th>Status</th>
				</tr>
				</thead>
				<tbody>
				@foreach($booking as $item)
					<tr>
						<td><a href="{{route('book-show', ['id'=>$item->id])}}">{{$item->id}}</a></td>
						<td><b>{{$item->lapangan->name}}</b><br/>{{$item->lapangan->address}}</td>
						<td>{{date('D, d M Y H:i',strtotime($item->jadwal))}}</td>
						<td>Rp{{$item->tariftotal}}</td>
						<td>{{$item->playermodel}}</td>
						<td>{{$item->status}}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="tab-pane fade" id="v-{{$menus[1]}}" role="tabpanel" aria-labelledby="v-pills-{{$menus[1]}}-tab">
			-
		</div>
		<div class="tab-pane fade" id="v-{{$menus[2]}}" role="tabpanel" aria-labelledby="v-pills-{{$menus[2]}}-tab">
			<table class="table table-striped booking-table">
				<thead>
				<tr>
					<th>Kode Booking</th>
					<th>Lapangan</th>
					<th>Jadwal</th>
					<th>Tarif</th>
					<th>Tipe Player</th>
					<th>Status</th>
				</tr></thead>
				<tbody>
				@foreach($booking as $item)
					<tr>
						<td>{{$item->id}}</td>
						<td>{{$item->lapangan->name}}<br/>{{$item->lapangan->address}}</td>
						<td>{{date('D, d M Y H:i',strtotime($item->jadwal))}}</td>
						<td>Rp{{$item->tariftotal}}</td>
						<td>{{$item->playermodel}}</td>
						<td>{{$item->status}}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('script')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$('.booking-table').dataTable({});
	</script>
@endsection