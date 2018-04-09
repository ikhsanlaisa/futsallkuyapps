@extends('customer.layout')

@section('title')
{{--Booking &middot; {{$item->title}}--}}
@endsection

@section('style')
@endsection

@section('content')
<section class="bar bg-primary no-mb color-white">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
{{--        <h1>{{$item->title}}</h1>--}}
        <div class="row">
        <div class="col-md-5">
{{--          <img src="{{asset('images/customer/sample/')}}/{{$item->icon}}" style="width: 98%;">--}}
        </div>
        <div class="col-md-7">
{{--          <h4>Harga</h4> <p>{{$item->price}},-/jam</p>--}}
{{--          <h4>Alamat</h4> <p>{{$item->addr}}</p>--}}
        </div>
        </div>
      </div>
      <div class="col-md-6">
        <h1>User Info</h1>
        <div>
        <h4>Username</h4> <p>Examples.</p>

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
        <div class="col-lg-4 text-center p-3">   <a href="#" class="btn btn-template-outlined-white">Lanjutkan</a></div>
      </div>
    </div>
  </div>
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