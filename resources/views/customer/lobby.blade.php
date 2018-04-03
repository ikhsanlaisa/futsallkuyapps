@extends('customer.layout')

@section('title')
Lobby
@endsection

@section('style')
@endsection

@section('content')
<section class="bar bg-white">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="heading">
          <h1>Lobby</h1>
        </div>
        <p class="lead mb-0">To divide information on the page - main information from secondary or one topic from another, the perfect way is to use our horizontal blocks. You can include in them texts, carousels, call to action elements etc.</p>
      </div>
    </div>
  </div>
</section>

<section class="bar bg-white">
<div class="row d-flex align-items-stretch same-height">
  <div class="col-md-4">
    <div class="box-simple box-white same-height">
      <div class="icon"><i class="fa fa-desktop"></i></div>
      <h4>Team 1</h4>
      <p></p>
    </div>
  </div>
  <div class="col-md-2">
    <div class="box-simple">
      <div class="icon-outlined">VS</div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box-simple box-white same-height">
      <div class="icon"><i class="fa fa-globe"></i></div>
      <h4>Campuran</h4>
      <p></p>
    </div>
  </div>
</div>
</section>
@endsection