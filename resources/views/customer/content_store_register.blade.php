<div class="container-fluid"><div class="row">
    <div class="col-md-12">
        <form class="form" id="signin-box" action="" method="post">
            <style type="text/css">#signin-box .form-group label:nth-child(1){margin:6px 0 0;}</style>
            <fieldset class="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="e.g. someone@example.com" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="notelp">No. Telpon</label>
                            <input class="form-control" type="text" name="notelp" id="notelp" placeholder="e.g. 08123456789" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="username" name="username" id="username" placeholder="e.g. someone_" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="e.g. 5omeone!" required="">
                        </div>
                    </div>
                </div>
            </fieldset>
            <hr/>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fullname">Nama Lengkap</label>
                                <input class="form-control" type="text" name="fullname" id="fullname" placeholder="e.g. John Smith" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tempatLahir">Tempat Lahir</label>
                                <input class="form-control" type="text" name="tempatLahir" id="tempatLahir" placeholder="e.g. Bandung" required="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="tanggalLahir">Tanggal Lahir</label>
                                <input class="form-control" type="text" name="tanggalLahir" id="tanggalLahir" placeholder="e.g. 1997-01-01" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <select class="form-control" name="provinsi" id="provinsi" placeholder="e.g. Jawa Barat" required="">
                                    <option>&mdash; Loading &mdash;</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <select class="form-control" name="kota" id="kota" placeholder="e.g. Bandung" required="">
                                    <option>&mdash; Select Province First &mdash;</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <style type="text/css">.awesomplete{display: block;}</style>
                                <input class="awesomplete form-control" type="text" name="alamat" id="alamat" placeholder="e.g. Jl. Telekomunikasi No.1" list="mylist" required="">

                                <ul id="mylistx" class="list-group"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="map-container">Alamat dalam Maps <span style="font-size: 8px;"><b>LAT:<i id="llat">X</i></b> <b>LONG:<i id="llon">X</i></b></span></label>
                                <div id="map-container" style="background-color: #ddd; width: 95%; min-height:300px;"></div>

                                <input type="hidden" name="lat" id="lat">
                                <input type="hidden" name="lon" id="lon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:2%; margin-bottom: 2%;"><div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
            </div></div>
        </form>
    </div>
</div>
</div>

@section('script')
<link rel="stylesheet" type="text/css" href="{{asset('/vendor/datepicker/bootstrap-datepicker3.min.css')}}">
<script type="text/javascript" src="{{asset('/vendor/datepicker/bootstrap-datepicker.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/vendor/awesomplete/awesomplete.css')}}">
<script type="text/javascript" src="{{asset('/vendor/awesomplete/awesomplete.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCdGAaS1utZmaezKhSGSTqnpMlrDEk3ss&libraries=places" async defer></script>

<script type="text/javascript">
    $(document).ready(()=>{
        populateIndonesiaGeo();

        $('#tanggalLahir').datepicker({format:'yyyy-mm-dd', endDate: '0d'});
    });

    function populateIndonesiaGeo(){
    var selectElement = $('#provinsi'), chainSelectElement= $('#kota');
    $.getJSON('{{asset("/raw/indonesia.json")}}', function(res){
        selectElement.empty()
        var provinsi=new Array();
        $.each(res, function(i, val){
            //selectElement.append('<option value="'+i+'">'+i+'</option>');
            provinsi.push(i);
        });
        provinsi.sort();
        $.each(provinsi, function(i, val){
            selectElement.append('<option value="'+val+'">'+val+'</option>');
        });
        selectElement.on('change', function(){
            chainSelectElement.empty();
            var chainSelectVal = res[$(this).val()].sort();
            $.each(chainSelectVal, (i, val)=>{
                chainSelectElement.append('<option value="'+val+'">'+val+'</option>');
            });
        });
    });  
    }

    $('#map-container').hide();
    $('#kota').on('change',function(){
        callMarker($(this));
        $('#map-container').show();
    });

    var map, markers=new Array(), zoomSize=14;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map-container'), {
            center: {lat: -6.914744, lng: 107.609810},
            zoom: zoomSize, 
            maxZoom:17
        });

        google.maps.event.addListener(map, 'click', function(evt){placeMarker(evt.latLng);});

    }

    window.addEventListener('load', initMap,false);

    function placeMarker(location){
        if(markers.length>0){markers.pop().setMap(null);}
        var marker = new google.maps.Marker({
        position: location,
        draggable:true,
        map: map
        });
        map.setCenter(location);
        markers.push(marker);
        var lat=location.lat(), lon=location.lng();
        $('#llat').html(lat); $('#llon').html(lon); 
        $('#lat').html(lat); $('#lon').html(lon); 
    }

    function callMarker(ele){
        var address=ele.val();
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                if(markers.length>0){markers.pop().setMap(null);}
                var marker = new google.maps.Marker({
                    map: map,
                    place: {
                        placeId: results[0].place_id,
                        location: results[0].geometry.location
                    }
                });
                markers.push(marker);
                placeMarker(results[0].geometry.location);
            }
        });
    }

    $('#alamat').on('keyup',function(ev){
        var address=$(this).val()+', '+$('#kota').val()+' '+$('#provinsi').val();
        if($('#alamat').val().length<3){$('#mylistx').hide(); return;}
        $('#mylistx').show();
        callAddress(address);
    });
    function callAddress(q){
        var address=q;
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                $('#mylistx').empty();
                $.each(results, function(i, val){
                    $('#mylistx').append('<li class="autocomplete-item list-group-item">'+results[0].formatted_address+'</li>');
                });
                // console.log(results);
            }
        });

    }
    $('#mylistx').on('dblclick','.autocomplete-item',function(ev){
        $('#alamat').val($(this).text());
        $('#mylistx').hide();

        callMarker($('#alamat'));
    });
</script>
@endsection