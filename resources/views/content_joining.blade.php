<div style="padding: 8px;">
	<?php
	$user = Auth::user();
	// var_dump($status);
	?>
	<form action="/book/join/{{$booking->id}}/confirmed" method="POST">
		{{csrf_field()}}
		<input type="hidden" name="_bookingid" value="{{$booking->id}}">
		<input type="hidden" name="_userid" value="{{$user->id}}">
		<h1>Joining #{{$booking->id}}</h1>
		<ul class="list-group">
			<li class="list-group-item">
				<h4>Location</h4>
				<div>{{$booking->lapangan->name}}</div>
				<div style="color:#888;font-size: 90%;">{{$booking->lapangan->address}}</div>
			</li>
			<li class="list-group-item">
				<h4 style="display: inline;">Schedule</h4>
				<?php
					$hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
					$jadwal_hari = $hari[date("w", strtotime($booking->jadwal))];
					$jadwal_tanggal = date("d M Y H:i", strtotime($booking->jadwal));
				?>
				<span>{{$jadwal_hari}}, {{$jadwal_tanggal}}</span>
			</li>
			<li class="list-group-item">
				<h4 style="display: inline;">Price</h4>
				<span>Rp{{$booking->tarif}} / <span>{{$booking->tariftype}}</span></span>
			</li>
			<li class="list-group-item">
				<h4 style="display: inline;">Players</h4>
				<span>{{$booking->playersNum}}</span>
			</li>
			<li class="list-group-item">
				<h4>Me</h4>
				<div>{{$user->name}}</div>
				<div style="color:#999; font-size: 80%;">{{$user->email}}</div>
			</li>
			<li class="list-group-item">
				<i style="color:#888; font-size: 80%; text-transform: uppercase;">By clicking "Continue" i agree about TOS</i>
			</li>
		</ul>
		<div class="row text-center" style="padding:8px; vertical-align: middle;">
			@if($status!=1)
			<div class="col-md-6"><a href="/lobbies" class="btn btn-block btn-danger">No, Back to Lobby</a></div>
			<div class="col-md-6"><button type="submit" class="btn btn-block btn-info">Yes, Continue</button></div>
			@else
			<div class="col-md-12"><a href="javascript:void(0);" class="btn btn-block btn-default">You've Already Joined</a></div>
			@endif
		</div>
	</form>
</div>