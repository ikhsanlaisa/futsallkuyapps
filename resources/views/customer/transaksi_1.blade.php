@extends('customer.layout')

@section('title')
    {{--Booking &middot; {{$item->title}}--}}
@endsection

@section('style')
@endsection
<?php
if(!isset($_GET['jadwal'])){die("<script>alert('Pilih Jadwal Dahulu.'); window.location.href='/';</script>");}
$jadwal = $_GET['jadwal'];
$jadwalDate = date('d M y H:i:s', strtotime($jadwal));
$hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
//$day = $hari[$day];

$user = Auth::user();
?>
@section('content')
    <section class="bar bg-primary no-mb color-white">
        <form action="/post_book" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>{{$laps->name}}</h1>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{asset('images/lapangan/')}}/{{$laps->foto}}" style="width: 98%;">
                        </div>
                        @php
                            $lapang = $laps->id;
                            $price = $laps->price;
                        @endphp
                        <div class="col-md-7">
                            <h4>Harga</h4>
                            <p>{{$laps->price}},-/jam</p>
                            <h4>Alamat</h4>
                            <p>{{$laps->alamat}}</p>
                            <h4>Jadwal</h4>
                            <p>{{$jadwalDate}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h1>User Info</h1>
                    <div>
                        <h4>Username</h4>
                        <p>{{$user->name}}</p>
                        <h4>No. Telepon</h4>
                        <p>{{$user->telp}}</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section>
        <div class="heading">
            <h2>Select Player Model</h2>
        </div>
        <div class="row d-flex align-items-stretch same-height">
            <div class="col-md-4">
                <div class="box-simple box-white same-height">
                    <label>
                        <div class="icon"><i class="fa fa-desktop"></i></div>
                        <h4>Full Team</h4>
                        <p>Full Player</p>
                        <input type="radio" name="player" value="fullteam"/>
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box-simple box-white same-height">
                    <label>
                        <div class="icon"><i class="fa fa-print"></i></div>
                        <h4>One Team</h4>
                        <p>Terdiri sekitar 4-7 Player</p>
                        <input type="radio" name="player" value="team"/>
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box-simple box-white same-height">
                    <label>
                        <div class="icon"><i class="fa fa-globe"></i></div>
                        <h4>One Player</h4>
                        <p>1 Player</p>
                        <input type="radio" name="player" value="oneplayer"/>
                    </label>
                </div>
            </div>
        </div>

        <div class="get-it">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-center p-3">
                        <h3>Lanjutkan ke Pembayaran?</h3>
                    </div>
                        {{csrf_field()}}
                        <div class="col-lg-4 text-center p-3">
                            <button type="submit" name="submit" class="btn btn-template-outlined-white">
                                <i class="fa fa-dot-circle-o"></i> Lanjutkan
                            </button>
                        </div>
                        <input type="hidden" id="jadwal" name="jadwal"
                               placeholder="Nama Lapangan" value="{{$jadwal}}" class="form-control" >
                        <input type="hidden" id="laps" name="laps"
                               placeholder="Nama Lapangan" value="{{$lapang}}" class="form-control" >
                        <input type="hidden" id="price" name="price"
                               placeholder="Nama Lapangan" value="{{$price}}" class="form-control" >

                </div>
            </div>
        </div>
        </form>
    </section>

    <section class="bar bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p></p>
                </div>
            </div>
        </div>
    </section>
@endsection