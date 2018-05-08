@extends('customer.layout')

@section('title')
    {{--{{$laps->title}}--}}
@endsection

@section('style')
    <style type="text/css">
        .img-fluid {
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <?php
    $codeText = $booking->id;
    // $code = md5($codeText);
    $code = $codeText;
    $server = "http://" . getHostByName(getHostName());
    $code = $server . "/booked/" . $code;
    ?>
    <section>
        <div class="row">
            <div class="col-sm-12" style="text-align:center;margin:8% 0 0 0">
                <div id="bookpay" style="display: none;">
                    <div id="success">
                        <div id="qrcodex"></div>
                        <span style="font-size: 75%;">{{$code}}</span>
                        <p><i class="fa fa-check-circle" style="color:#8bc34a;"></i> Pemesanan Berhasil. Tunjukan QR
                            diatas ke Kasir.</p>
                    </div>
                    <a href='/lobby' class="btn btn-primary" style="width: 30%;">Lobby Untuk melihat jadwal lainnya<i
                                class="fa fa-chevron-right"></i></a>
                </div>
                <img id="preloader" src="{{asset('images/loading3.gif')}}" style="width:100px;">
                <div id="textstatus" style="padding:20px 10px;">Melakukan pengecekan jadwal ...</div>
            </div>
        </div>
    </section>


@endsection

@section('script')
    <script type="text/javascript" src="{{asset('js/jquery.qrcode.min.js')}}"></script>
    <script type="text/javascript">
        $('#qrcodex').qrcode({width: 300, height: 300, text: "{{$code}}"});
        $('#qrcodex').find('canvas').hide();
        $('#qrcodex').find('canvas:nth-child(1)').show();
        var preloader = $('#preloader'), bookpay = $('#bookpay'), txtstatus = $('#textstatus');
        $(document).ready(() => {
            preloader.show();
            setTimeout(() => {
                txtstatus.html('Melakukan pemesanan ...');
                setTimeout(() => {
                    preloader.hide();
                    txtstatus.hide();
                    bookpay.fadeIn(2000);
                }, 2000);
            }, 2000);
        });
    </script>
@endsection