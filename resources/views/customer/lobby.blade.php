@extends('customer.layout')
@section('title')
Match Lobbies
@endsection
@section('style')
@endsection
@section('content')
<div class="row">
  <div class="col col-md-12">
    &nbsp;
    <a href="/lobbies/randomize" class="btn btn-primary-outline pull-right">Randomize</a>
  </div>
</div>
<br/>
<div class="row">
  <div class="col col-md-12">
    <table class="table table-striped">
      <tr>
        <th width="10%">#</th>
        <th width="30%">Tempat</th>
        <th width="15%">Jadwal</th>
        <th width="10%">Tarif</th>
        <th width="15%">Estimasi Jarak</th>
        <th width="10%">Player</th>
        <th>&nbsp;</th>
      </tr>
      @if(count($booking)<1)
      <tr>
        <td colspan="6" class="text-center">No Data</td>
      </tr>
      @else
      @foreach($booking as $i => $item)
      <?php 
        $hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        $jadwal_hari = $hari[date("w", strtotime($item->jadwal))];
        $jadwal_tanggal = date("d M Y H:i", strtotime($item->jadwal));
        $datediff = time() - strtotime($item->jadwal);
        $datestatus = round($datediff / (60 * 60 * 24))>=0?0:1;
        // var_dump(round($datediff / (60 * 60 * 24)));

        //Skip Conditional
        // if($datestatus!=1){continue;}
        if($item->playermodel=='fullteam'){continue;}
      ?>
      <tr class="item">
        <td><a href="/book/show/{{$item->id}}">{{$item->id}}</a></td>
        <td class="placeInfo" data-address="{{$item->lapangan->address}}" data-latlon="{{$item->lapangan->latlon}}">
          <b>{{$item->lapangan->name}}</b>
          <p>{{$item->lapangan->address}}</p>
        </td>
        <td><u>{{$jadwal_hari}}</u> <br/> {{$jadwal_tanggal}}</td>
        <td>Rp{{$item->tarif}}</td>
        <td class="placeMatrix">-</td>
        <td>
          @if($item->playermodel == "team")
            Team
          @else
            1 Player
          @endif
        </td>
        <td>
          @if($datestatus==1)
          <div class="input-group">
              <div class="input-group-append">
              <a href="/book/show/{{$item->id}}" class="btn btn-secondary">Show</a>
              <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                <span class="sr-only">Detail</span>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="/book/show/{{$item->id}}">Detail</a>
                <a class="dropdown-item" href="/book/join/{{$item->id}}">Join</a>
              </div>
            </div>
          </div>
          @else
          <button class="btn btn-danger btn-block">Expired</button>
          @endif
        </td>
      </tr>
      @endforeach
      @endif
    </table>
  </div>
</div>
@endsection

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCdGAaS1utZmaezKhSGSTqnpMlrDEk3ss&libraries=places" async defer></script>

<script type="text/javascript">
  var lat, lon;
  var destinations=[];
  $(window).ready(function(evt){
    getLocation();

    console.log($('tr.item').length);

    for(var i=0; i<$('tr.item').length; i++){
      var tr = $('tr.item')[i];
      var place = $(tr).find('td.placeInfo');
      var dest = place.data('latlon').length<1?place.data('address'):place.data('latlon');
      // console.log(dest);
      destinations.push(dest);
    }
    console.log(destinations);
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

    var geocoder = new google.maps.Geocoder();
    console.log('Lat '+lat+', Lon '+lon);
    var latlng = {lat: parseFloat(lat), lng: parseFloat(lon)};
    geocoder.geocode({'location': latlng}, function(results, status) {
      if (status === 'OK') {
        if(results[0]){
          console.log(results[0].formatted_address);
        }else{console.log('No Result.');}
      }else{
        console.log('Geocoder failed due to: ' + status);
      }
    });
    getDistanceVal();
  }
  function getDistanceVal(){
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
        for(var d=0; d<destinations.length; d++){
          var matrix = response.rows[0].elements[d];
          $($('tr.item')[d]).find('td.placeMatrix').html("<b>"+matrix.distance.text+"</b>&nbsp;<span>("+matrix.duration.text+")</span>");
        }
      }
    });

  }
</script>
@endsection