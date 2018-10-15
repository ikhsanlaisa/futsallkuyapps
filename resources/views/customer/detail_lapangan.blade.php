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
<?php 
date_default_timezone_set("Asia/Jakarta");
#var_dump($lap); 
?>
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
        <p class="lead no-mb">{{$lap->description}}</p>
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
                    <p>{{$lap->houropen}} - {{$lap->hourclose}}</p>
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
                <form action="/lapangan/{{$lap->id}}/book" method="GET" id="booknow">
                    <div class="heading">
                        <h3>Jadwal Tersedia</h3>
                    </div>
                    <div class="" style="margin:10px 0;">
                        <?php
                        $week = (object) array();
                        $week->year = date('Y');
                        $week->month = date('m');
                        $week->weekOfYear = date('W');
                        $week->weekOfMonth = weekOfMonth($week->month);
                        $week->manyWeekOfMonth = weeks($week->month,$week->year);
                        $week->beginDateOfMonth = date('Y-m-01', strtotime($week->year."W".$week->weekOfYear));
                        $week->lastDateOfMonth = date('Y-m-t', strtotime($week->year."W".$week->weekOfYear));
                        $week->beginWeekOfMonth = date('W', strtotime($week->beginDateOfMonth));
                        $week->lastWeekOfMonth = date('W', strtotime($week->lastDateOfMonth));
                        $week->set = isset($_GET['week'])?$_GET['week']:$week->weekOfYear;
                        $week->isWeekInThisMonth = $week->set==''?'':($week->set>$week->lastWeekOfMonth || $week->set<$week->beginWeekOfMonth)?false:true;
                        $week->currentWeek = ($week->isWeekInThisMonth==true)?$week->set:$week->weekOfYear;
                        $week->nextWeek = ($week->isWeekInThisMonth==true)?$week->currentWeek+1:$week->lastWeekOfMonth;
                        $week->prevWeek = ($week->isWeekInThisMonth==true)?$week->currentWeek-1:$week->beginWeekOfMonth;
                        $week->beginDateOfWeek = date('Y-m-d', strtotime("last sunday midnight", strtotime($week->year."W".$week->currentWeek)));
                        $week->lastDateOfWeek = date('Y-m-d', strtotime("next saturday", strtotime($week->year."W".$week->currentWeek)));
                        ?>
                        <div class="input-group input-group-lg">
                            <div class="input-group-append">
                                <a href='?week={{$week->prevWeek}}' class="btn btn-secondary "><i class="fa fa-chevron-left"></i></a>
                                &nbsp;
                            </div>
                            <div class="form-control" style="text-align: center;">
                                  <!-- <?php echo date("d M Y", strtotime($week->beginDateOfWeek)); ?> &mdash; <?php echo date("d M Y", strtotime($week->lastDateOfWeek)); ?> -->
                                  <select class="form-control form-control-lg" onchange="window.location.href='?week='+this.value;" style="text-indent: 30%; ">
                                    @for($w=$week->beginWeekOfMonth; $w<=$week->lastWeekOfMonth; $w++)
                                    <option value="{{$w}}" {{$w==$week->currentWeek?'selected':''}}>
                                    Minggu ke-{{$w}} 
                                    (<?php echo date('d M Y', strtotime("last sunday midnight", strtotime($week->year."W".$w))); ?> &mdash; <?php echo date('d M Y', strtotime("next saturday", strtotime($week->year."W".$w))); ?>)
                                    </option>
                                    @endfor
                                  </select>
                            </div>
                            <div class="input-group-append">
                                &nbsp;
                                <a href='?week={{$week->nextWeek}}' class="btn btn-secondary "><i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="jadwal" style="width:100%; overflow-y: auto;">
                        <!-- <input type="hidden" name="minggu" value="{{date('W')}}"> -->
                        <?php
                        $hari=['minggu','senin','selasa','rabu','kamis','jumat','sabtu'];
                        $terisi = ['13-1','13-4','17-5','22-6'];
                        $isi = ['2018-05-22T11:00:00Z', '2018-05-16T10:00:00Z', '2018-05-12T10:00:00Z', '2018-05-30T08:00:00Z'];
                        $isi = array();

                        $bookings = $lap->booking;
                        foreach ($bookings as $key => $book) {
                            array_push($isi, $book->jadwal);
                        }

                        //var_dump($isi);
                        ?>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th></th>
                                @foreach($hari as $i => $d)
                                    <th style="text-align: center;">{{ucfirst($d)}}<span style="display:block;font-size: 10px;">{{date('d M Y', strtotime($week->year.'W'.$week->currentWeek.'-'.$i))}}</span></th>
                                @endforeach
                            </tr>

                            <!-- TIME ROW -->
                            @for($t=strtotime("08:00"); $t<strtotime("23:00"); $t+=60*60)
                                <?php 
                                    $c=date("H:i",$t); 
                                    $h=date("H",$t); 
                                    $i=date("i",$t); 
                                ?>
                                <tr>
                                    <th>{{$c}}</th>
                                    <!-- DAY COLUMN -->
                                    @for($td=0; $td<count($hari); $td++)
                                        <td style="text-align: center; width: 13%;">
                                            <?php
                                            $d=date('d',strtotime($week->year."-W".$week->currentWeek."-".$td));
                                            $timestampVal = mktime($h,$i,0,$week->month,$d,$week->year);
                                            $datev = date("Y-m-d", $timestampVal);
                                            $timev = date("H:i:s", $timestampVal);
                                            $timestampVal = $datev."T".$timev."Z";
                                            //var_dump($dateVal);
                                            ?>
                                            <?php if(($week->currentWeek<$week->weekOfYear) || ($week->currentWeek<=$week->weekOfYear) && $d<date('d')){echo "<i class='fa fa-warning' style='color:#dcdcdc;font-size:80%;' title='Kadaluarsa'></i>"; continue;} ?>
                                            <?php
                                            $isGet = false;
                                            ?>
                                            @if(count($bookings)>0)
                                            @foreach($isi as $ada)
                                                <?php
                                                $isGet = ($timestampVal==$ada)?true:false;
                                                ?>
                                                @if($isGet==true)
                                                    <i class="fa fa-check-square" style="font-size: 200%; color:#4fbfa8;" title="Jadwal Sudah Diambil"></i>
                                                    <?php break;?>
                                                @endif
                                            @endforeach
                                            @endif
                                            @if($isGet==false)
                                            <!-- <button class="btn btn-default" title="{{$td}}|{{date('H:i',$t)}}">Ambil</button> -->
                                                @if($td>date('w') || $h>date('H') || $d!=date('d'))
                                                <label class="radioStyle" title="{{$timestampVal}}">
                                                    <i class="fa fa-thumbs-o-up"></i>
                                                    <input type="radio" name="jadwal" value="{{$timestampVal}}">
                                                </label>
                                                @else
                                                <i class='fa fa-warning' style='color:#dcdcdc;font-size:80%;' title='Kadaluarsa'></i>
                                                @endif
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAy4dCOO4h6xXdHI_YGG0l740nx6mYlD8A&callback=initMap&libraries=places"
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
            //alert(latlon);
            ele.attr('data-current', latlon);
        }

        function getDistance() {
            var ele = $('#map-info');
            var current = ele.data('current');
            var destionation = address;

        }
    </script>
@endsection