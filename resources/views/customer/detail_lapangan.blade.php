@extends('customer.layout')

@section('title')
{{$lap->name}}
@endsection

@section('style')
<style type="text/css">
  .img-fluid{width: 100%;}
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
  <p class="lead no-mb">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
</div>

<section class="bar">
  <div class="row portfolio-project">
    <div class="col-sm-8">
      <div class="project owl-carousel mb-4 owl-loaded owl-drag">
        <div><img class="img-fluid flex-wrap" src="{{asset('images/lapangan/')}}/{{$lap->foto}}" alt=""></div>
        {{--<div><img class="img-fluid flex-wrap" src="{{asset('images/customer/sample/lap2.jpg')}}" alt=""></div>--}}
        {{--<div><img class="img-fluid flex-wrap" src="{{asset('images/customer/sample/lap3.jpg')}}" alt=""></div>--}}
        {{--<div><img class="img-fluid flex-wrap" src="{{asset('images/customer/sample/lap4.jpg')}}" alt=""></div>--}}
        {{--<div><img class="img-fluid flex-wrap" src="{{asset('images/customer/sample/coverblock.jpg')}}" alt=""></div>--}}
      </div>
    </div>
    <div class="col-sm-4">
      <div class="project-more">
        {{--<h4>Harga</h4> <p>{{$l->price}},-/jam</p>--}}
        {{--<h4>Rating</h4> <p></p>--}}
        <h4>Pilih Jadwal</h4>
        <p>
          <div class="box-simple box-white same-height">
          <form id="search-field" method="POST" action="/home/submitRequest.html">
            <div class="form-group">
              <label style="">No. Telepon</label>
              <input type="text" class="form-control" name="no_telp" aria-describedby="emailHelp" placeholder="Enter your No. Telp">
            </div>

          </form>
        </div>
        </p>
        <h4>Jam Operasional</h4> <p>08.00 - 22.00 WIB</p>
        <h4>Alamat</h4> <p></p>
        
        <p><a href="/book/" class="btn btn-lg btn-outline-primary btn-block">Book Now</a></p>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="heading">
        <h3>Jadwal Tersedia</h3>
      </div>
      <div class="jadwal" style="width:100%; overflow-y: auto;">
        <?php
        $hari=['','senin','selasa','rabu','kamis','jumat','sabtu','minggu'];
        $terisi = ['13-1','13-4','17-5','22-6'];
        ?>
        <table class="table table-striped table-bordered">
          <tr>
            @foreach($hari as $d)
            <th style="text-align: center;">{{ucfirst($d)}}</th>
            @endforeach
          </tr>

          @for($t=strtotime("08:00"); $t<strtotime("23:00"); $t+=60*60)
          <?php $c=date("H:i",$t); ?>
          <tr>
            <th>{{$c}}</th>
            @for($td=0; $td<count($hari)-1; $td++)
            <td>
              @foreach($terisi as $ada)
              <?php 
              list($cc, $tdd)=explode('-',$ada);
              $cx = date('H',strtotime($c)); 
              ?>

              @if($cx==$cc && $td==$tdd)                   
              <button class="btn btn-warning" title="{{date("H:i",$t)}} - {{$td}}">Sudah Diambil</button>
              @endif
              @endforeach
            </td>
            @endfor
          </tr>
          @endfor
        </table>
      </div>
    </div>
  </div>
</section>


@endsection