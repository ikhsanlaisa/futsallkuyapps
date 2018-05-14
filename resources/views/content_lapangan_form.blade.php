<div class="container-fluid"><div class="row">
    <div class="col-md-12">
        <form class="form" id="" action="{{route('create_lapangan')}}" method="post">
            {{csrf_field()}}
            <style type="text/css">#signin-box .form-group label:nth-child(1){margin:6px 0 0;}</style>
            <div class="row">
                <div class="col-md-6" id="form-field-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="namaLapangan">Nama Lapangan</label>
                                <input class="form-control" type="text" name="namaLapangan" id="namaLapangan" placeholder="e.g. Futsal Go" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" required="" placeholder="" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">Tarif</label>
                                <div class="input-group">
                                <input class="form-control" type="text" name="price" id="price" placeholder="e.g. 10000" required="">
                                <div class="input-group-append">
                                    <i class="input-group-text">/</i>
                                    <select class="form-control custom-select" name="pricetype">
                                    <?php $priceType = ['1 Hour', '2 Hour', '3 Hour']; ?>
                                    @foreach($priceType as $t => $val) 
                                        <option value="{{$t}}">{{$val}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jumlahLapangan">Jumlah Lapangan Tersedia</label>
                                <input class="form-control" type="number" name="jumlahLapangan" id="jumlahLapangan" value="0" required="">
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
                                <textarea class="form-control" rows="2" name="alamat" id="alamat" placeholder="e.g. Jl. Telekomunikasi No.1" required=""></textarea>

                                <ul id="mylistx" class="list-group"></ul>
                            </div>
                        </div>
                    </div>

                    <div class="row"><div class="col-md-12">
                        <div class="form-group"><label for="uploadphotos">Upload Photos</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="uploadphotos" name="uploadphotos">
                                <label class="custom-file-label" for="uploadphotos">Choose file</label>
                            </div>
                        </div>
                        </div>
                    </div></div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="map-container">Alamat dalam Maps <span style="font-size: 8px;"><b>LAT:<i id="llat">X</i></b> <b>LONG:<i id="llon">X</i></b></span></label>
                                <div id="map-container" style="background-color: #ddd; width: 99%; min-height:300px;"></div>

                                <input type="hidden" name="lat" id="lat">
                                <input type="hidden" name="lon" id="lon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:2%; margin-bottom: 2%;"><div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">Create New</button>
            </div></div>
        </form>
    </div>
</div>
</div>

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCdGAaS1utZmaezKhSGSTqnpMlrDEk3ss&libraries=places" async defer></script>

<script type="text/javascript">
    $(document).ready(()=>{
        populateIndonesiaGeo();
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
        $('#map-container').height($('#form-field-container').height());
        $('#map-container').show();
    });

    var map, markers=new Array(), zoomSize=14;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map-container'), {
            center: {lat: -6.914744, lng: 107.609810},
            zoom: zoomSize, 
            maxZoom:17
        });

        google.maps.event.addListener(map, 'click', function(evt){callLatLng(evt.latLng, $('#alamat'));});

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
    function callLatLng(location, targetELement){
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'location': location}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                placeMarker(location);
                targetELement.val(results[0].formatted_address);
                // var infowindow = new google.maps.InfoWindow;
                // infowindow.setContent(results[0].formatted_address);
                // infowindow.open(map, markers[0]);
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