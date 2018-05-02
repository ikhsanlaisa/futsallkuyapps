@extends('customer.layout')

@section('title')
    {{$lap->name}}
@endsection

@section('style')
    <style type="text/css">
        .img-fluid {
            width: 100%;
        }

        .radioStyle {
            width: 30px;
            height: 30px;
            display: inline-block;
            background-color: #dcdcdc;
            border-radius: 50%;
            line-height: 2;
            border: 1px solid #fff;
            cursor: pointer;
        }

        .radioStyle:hover {
            background-color: #fbc02d;
        }

        label.active {
            background-color: #fbc02d;
        }

        .radioStyle input[type=radio] {
            display: none;
        }

        .radioStyle i.fa {
            display: none;
            color: #545454;
        }
    </style>
@endsection

@section('content')
    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row d-flex align-items-center flex-wrap">
                <div class="col-md-7">
                    <h1 class="h2">
                        {{$lap->name}}
                    </h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="index.html">Lapangan</a></li>
                        <li class="breadcrumb-item active">
                            {{$lap->name}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="heading">
            <h2>Deskripsi</h2>
        </div>
        <p class="lead no-mb">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
            egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit
            amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
    </div>

    <section class="bar">
        <div class="row portfolio-project">
            <div class="col-sm-8">
                <div class="project owl-carousel mb-4 owl-loaded owl-drag">
                    <div><img class="img-fluid flex-wrap" src="{{asset('images/lapangan/')}}/{{$lap->foto}}" alt="">
                    </div>
                    {{--<div><img class="img-fluid flex-wrap" src="{{asset('images/customer/sample/lap2.jpg')}}" alt=""></div>--}}
                    {{--<div><img class="img-fluid flex-wrap" src="{{asset('images/customer/sample/lap3.jpg')}}" alt=""></div>--}}
                    {{--<div><img class="img-fluid flex-wrap" src="{{asset('images/customer/sample/lap4.jpg')}}" alt=""></div>--}}
                    {{--<div><img class="img-fluid flex-wrap" src="{{asset('images/customer/sample/coverblock.jpg')}}" alt=""></div>--}}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="project-more">
                    <h4>Harga</h4>
                    <p>{{$lap->price}},-/jam</p>
                    {{--<h4>Rating</h4> <p></p>--}}
                    <h4>Jam Operasional</h4>
                    <p>08.00 - 22.00 WIB</p>
                    <h4>Alamat</h4>
                    <p>{{$lap->alamat}}</p>
                    <p style="height:300px;" id="map-block" data-addr="{{$lap->name}}, {{$lap->alamat}}"></p>
                    <div data-current='' data-dest='' style="display:none; text-align: center;" id="map-info">
                        <p id="preloader-location" style="height: 30px;"><img src="{{asset('images/loading1.gif')}}" style="width: 30px;"></p>
                        <p id="info-location" style="display: none;"><b><span id="distance-value">123</span>KM</b> <span>from your location</span></p>
                    </div>
                </div>
            </div>

            <!-- BLOCK JADWAL -->
            <div class="col-sm-12">
                <form action="/book/{{$lap->id}}" method="GET" id="booknow">
                    <div class="heading">
                        <h3>Jadwal Tersedia</h3>
                    </div>
                    <div class="" style="margin:10px 0;">
                        <?php
                        $year = date('Y');
                        $month = date('m');
                        $currentWeekYear = date('W');
                        $currentWeek = weekOfMonth($month);
                        $nextWeek = $currentWeek+1;
                        $prevWeek = $currentWeek-1;
                        $toWeek = weekOfMonth($month);
                        $toWeek += isset($_GET['week'])?$_GET['week']:0;
                        $numberOfWeekFromThisMonth = weeks($month,$year);
                        $getDateFromThisWeek = date('d M Y', strtotime($year."W".$currentWeekYear));
                        ?>
                        <div class="input-group input-group-lg">
                            <div class="input-group-append">
                                <a href='?week={{$prevWeek-5}}' class="btn btn-secondary "><i class="fa fa-chevron-left"></i></a>
                                &nbsp;
                            </div>
                            <div class="form-control" style="text-align: center;">
                                Minggu ke {{$toWeek}} &mdash; {{$getDateFromThisWeek}}
                            </div>
                            <div class="input-group-append">
                                &nbsp;
                                <a href='?week={{5-$nextWeek}}' class="btn btn-secondary "><i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="jadwal" style="width:100%; overflow-y: auto;">
                        <input type="hidden" name="minggu" value="{{date('W')}}">
                        <?php
                        $hari=['minggu','senin','selasa','rabu','kamis','jumat','sabtu'];
                        $terisi = ['13-1','13-4','17-5','22-6'];
                        ?>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th></th>
                                @foreach($hari as $d)
                                    <th style="text-align: center;">{{ucfirst($d)}}</th>
                                @endforeach
                            </tr>

                            @for($t=strtotime("08:00"); $t<strtotime("23:00"); $t+=60*60)
                                <?php $c=date("H:i",$t); ?>
                                <tr>
                                    <th>{{$c}}</th>
                                    @for($td=0; $td<count($hari); $td++)
                                        <td style="text-align: center; width: 13%;">
                                            <?php if($toWeek<=$currentWeek && $td<date('w')){echo "<i class='fa fa-warning' style='color:#dcdcdc;font-size:80%;' title='Kadaluarsa'></i>"; continue;} ?>
                                            @foreach($terisi as $ada)
                                                <?php
                                                list($cc, $tdd)=explode('-',$ada);
                                                $cx = date('H',strtotime($c));
                                                $isGet = ($cx==$cc && $td==$tdd)?true:false;
                                                ?>
                                                @if($isGet==true)
                                                    <i class="fa fa-check-square" style="font-size: 200%; color:#4fbfa8;" title="Jadwal Sudah Diambil"></i>
                                                    <?php break;?>
                                                @endif
                                            @endforeach
                                            @if($isGet==false)
                                            <!-- <button class="btn btn-default" title="{{$td}}|{{date('H:i',$t)}}">Ambil</button> -->
                                                <label class="radioStyle">
                                                    <i class="fa fa-thumbs-o-up"></i>
                                                    <input type="radio" name="jadwal" value="{{$td}}-{{date('H:i',$t)}}" title="{{$td}}|{{date('H:i',$t)}}">
                                                </label>
                                            @endif
                                        </td>
                                    @endfor
                                </tr>
                            @endfor
                        </table>
                    </div>
                    <button class="btn btn-lg btn-outline-primary btn-block" type="submit">Book Now</button>
                </form>
            </div>
            <!-- BLOCK JADWAL -->
        </div>
    </section>

    <div class="modal fade"
         id="modaledit"
         tabindex="-1"
         role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Lokasi Lapangan</h4>
                </div>
                <div id="map"></div>
                <script>
                    function initMap(lap) {
                        var uluru = {lat: lap.latitude, lng: lap.longitude;
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 4,
                            center: uluru
                        });
                        var marker = new google.maps.Marker({
                            position: uluru,
                            map: map
                        });
                    }
                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCiRGtghXH7VPZ_6WpZKBCqsovwRql6ww&callback=initMap">
                </script>
            </div>
        </div>
    </div>

    <?php
    // Banyak Minggu dalam Bulan
    function weeks($month, $year)
    {
        $num_of_days = date("t", mktime(0, 0, 0, $month, 1, $year));
        $lastday = date("t", mktime(0, 0, 0, $month, 1, $year));
        $no_of_weeks = 0;
        $count_weeks = 0;
        while ($no_of_weeks < $lastday) {
            $no_of_weeks += 7;
            $count_weeks++;
        }
        return $count_weeks;
    }
    // Minggu ke X
    function weekOfMonth($date)
    {
        $firstOfMonth = strtotime(date("Y-m-01", $date));
        return (intval(date("W", $date)) - intval(date("W", $firstOfMonth)) + 1) + 1;
    }
    ?>
@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCdGAaS1utZmaezKhSGSTqnpMlrDEk3ss&callback=initMap&libraries=places"
            async defer></script>
    <script type="text/javascript">
        $(document).ready(() => {
            console.log('halo');
        });

        $('input[name=jadwal]').click((e) => {
            $('.radioStyle').removeClass('active');
            $('.radioStyle').find('i').hide();
            $(e.target).parent().addClass('active');
            $(e.target).parent().find('i').fadeIn();
            console.log('click item ' + e.target);
        });

        // $("#booknow").submit((e)=>{
        //   e.preventDefault();
        //   var optionDate = $('input[name=jadwal]');
        //   swal({title: 'Pemesanan', text:' ', icon:'success',button: false});
        //   $("#booknow").submit();
        // });

        // GMaps Key: AIzaSyCCdGAaS1utZmaezKhSGSTqnpMlrDEk3ss

        var address = $('#map-block').data('addr');

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map-block'), {
                center: {lat: -6.914744, lng: 107.609810},
                zoom: 14
            });
            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({'address': address}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);

                    var marker = new google.maps.Marker({
                        map: map,
                        place: {
                            placeId: results[0].place_id,
                            location: results[0].geometry.location
                        }
                    });

                    $('#map-info').fadeIn(1000);

                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
                // console.log(results);
                // console.log(status);
                // console.log(address);
            });

        }

        getLocation();

        function getLocation() {
            $('#preloader-location').show();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((success) => {
                    showPosition(success);
                    // console.log(success);
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(pos) {
            $('#preloader-location').hide();
            $('#info-location').show();
            var ele = $('#map-info');
            console.log(pos);
            var latlon = pos.coords.latitude + ',' + pos.coords.longitude;
            alert(latlon);
            ele.attr('data-current', latlon);
        }

        function getDistance() {
            var ele = $('#map-info');
            var current = ele.data('current');
            var destionation = address;

        }
    </script>
@endsection