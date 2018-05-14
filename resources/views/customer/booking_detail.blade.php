@extends('customer.layout')
@section('title')
Book &middot; #{{$booking->id}}
@endsection
@section('style')
@endsection
@section('content')
<?php
$user = Auth::user();

$menus = ['Detail', 'QR', 'Players'];
?>
<ul class="nav nav-pills" id="pills-tab" role="tablist">
	@foreach($menus as $i => $menu)
	<?php if($i==1 && $booking->customer_id!=$user->id && $user->roles==3){continue;} ?>
	<li class="nav-item">
		<a class="nav-link {{$i==0?'active':''}}" id="{{$menu}}-tab" data-toggle="pill" href="#tab-{{$menu}}" role="tab" aria-controls="pills-{{$menu}}">{{$menu}}</a>
	</li>
	@endforeach
</ul>
<div class="tab-content" id="pills-tabContent">
	<style type="text/css">#pills-tabContent label:nth-child(1){margin:4px 0 0;} .label{font-size:160%;}</style>
	<div class="tab-pane fade show active" id="tab-{{$menus[0]}}" role="tabpanel">
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<label>ID</label>
					<div>
						<b class="label">#{{$booking->id}}</b>
					</div>
				</div>
				<div class="form-group">
					<label>Tempat</label>
					<div>
						<b class="label">{{$booking->lapangan->name}}</b>
						<p id="placeAddress">{{$booking->lapangan->address}}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
						<?php
						$hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
						$jadwal_hari = $hari[date("w", strtotime($booking->jadwal))];
						$jadwal_tanggal = date("d M Y H:i", strtotime($booking->jadwal));
						?>
						<div class="form-group">
							<label>Jadwal</label>
							<div>
								<b class="label"><div>{{$jadwal_hari}}</div></b>
								<div>{{$jadwal_tanggal}}</div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label>Status</label>
							<div>
								<b class="label">{{ucfirst($booking->status)}}</b>
								<p style="font-size: 80%;">{{$booking->created_at}}</p>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Tarif</label>
					<div>
						<b class="label">Rp{{$booking->tarif}} / {{$booking->tariftype}}</b>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Mode</label>
							<div>
								<b class="label">{{ucfirst($booking->playermodel)}}</b>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Assignee</label>
							<div>
								<b class="label">{{$booking->customer->name}}</b>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="row">
					<div class="col-md-12">
						<div id="map-container" style="min-height: 58vh; width: 100%; background-color:#f5f5f5;"></div>
					</div>
				</div>
				<div class="row text-center" style="margin:12px 0 0;">
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<label>Distance</label>
							<div>
								<b class="label" id="matrixDistance">-- KM</b>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<label>Duration</label>
							<div>
								<b class="label" id="matrixDuration">-- Mins</b>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<a href="/book/join/{{$booking->id}}" class="btn btn-block btn-outline-secondary">Join</a>
			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="tab-{{$menus[1]}}" role="tabpanel">
		<div class="row">
			<div class="col-md-5 offset-md-4 text-center">
				<div id="qr-container" style="min-height: 50vh; width: 98%; padding:5%; background-color: #f5f5f5;"></div>
				<p id="qr-text" style="font-size:80%;"></p>
				<hr/>
				<div>
					@if($user->roles!=3)
					<a href="#confirmation" class="btn btn-primary btn-block">Confirmation</a>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="tab-{{$menus[2]}}" role="tabpanel">
		<div class="row" style="margin:5px 0;">
			<div class="col-md-3 offset-md-9">
				<a href="/book/join/{{$booking->id}}" class="btn btn-block btn-primary">Assign Me</a>
			</div>
		</div>
		<div class="row">
		<table class="table table-striped">
			<tr>
				<th width="5%">#</th>
				<th width="30%">Player Name</th>
				<th width="25%">Label</th>
				<th>From</th>
				<th>Join Time</th>
			</tr>
			<?php
			//var_dump($booking->players);
			?>
			@foreach($booking->players as $p => $player)
			<tr>
				<td width="5%">{{($p+1)}}</td>
				<td width="30%">{{$player->user->name}}</td>
				<td width="25%">{{$player->user->email}}</td>
				<td>-</td>
				<td>{{$player->created_at}}</td>
			</tr>
			@endforeach
		</table>
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCdGAaS1utZmaezKhSGSTqnpMlrDEk3ss&libraries=places" async defer></script>
<script type="text/javascript" src="{{asset('js/jquery.qrcode.min.js')}}"></script>

<?php
$codeText = $booking->id;
// $code = md5($codeText);
$code = $codeText;
$server = "http://" . getHostByName(getHostName());
$code = $server . "/book/show/" . $code;
?>
<script type="text/javascript">
var lat, lon;
var destinations=[];
	$(window).ready(function(evt){
	getLocation();

	$('#qr-container').qrcode({width: 370, height: 370, text: "{{$code}}"});
	$('#qr-text').text("{{$code}}");
	});
	function getLocation() {
	    if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(getPosition);
	    } else { 
	        console.log("Geolocation is not supported by this browser.");
	    }
  	}
  	function getPosition(pos){
	    lat=pos.coords.latitude;
	    lon=pos.coords.longitude;
	    console.log('Lat '+lat+', Lon '+lon);
	}

    window.addEventListener('load', initMap,false);
	function initMap() {
		var address = "{{$booking->lapangan->name}}, {{$booking->lapangan->address}}";
		var geocoder = new google.maps.Geocoder();
        map = new google.maps.Map(document.getElementById('map-container'), {
            center: {lat: -6.914744, lng: 107.609810},
            zoom: 14
        });
		geocoder.geocode({'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
            	var latlng = new google.maps.LatLng(lat,lon);
                map.setCenter(results[0].geometry.location);
                var myMarker = new google.maps.Marker({
                    map: map,
                    position: latlng,
                    label: 'ME'
                });

                var marker = new google.maps.Marker({
                    map: map,
                    place: {
                        placeId: results[0].place_id,
                        location: results[0].geometry.location
                    },
                   	title: "{{$booking->lapangan->name}} ("+results[0].place_id+")"
                });
                destinations.push(results[0].geometry.location);
                // markers.push(marker);
                // placeMarker(results[0].geometry.location);
                callPosition();
            }
        });
    }
    function callPosition(){
    	var bandung = new google.maps.LatLng(-6.914744,107.609810);
    	var latlng = new google.maps.LatLng(lat,lon);
    	var service = new google.maps.DistanceMatrixService;
	    service.getDistanceMatrix({
	      origins: [latlng],
	      destinations: destinations,
	      travelMode: 'DRIVING',
	      unitSystem: google.maps.UnitSystem.METRIC,
	      avoidHighways: false,
	      avoidTolls: false
	    }, function(response, status) {
	      if (status !== 'OK') {
	        alert('Error was: ' + status);
	      } else {
	      	console.log(response);
	      	if(response.rows[0].elements[0]){
	      		$('#matrixDistance').html(response.rows[0].elements[0].distance.text);
	      		$('#matrixDuration').html(response.rows[0].elements[0].duration.text);
	      	}
	      }
	    });
    }

</script>
@endsection