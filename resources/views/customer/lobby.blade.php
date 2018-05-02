@extends('customer.layout')

@section('title')
Lobby
@endsection

@section('style')
<style type="text/css">
  .vsrow{margin:0;}
  .vsrow .icon{font-size: 200%;}
  .vsrow h4{margin:0;}
  .vsrow p{margin:0;}
  .vsrow .box-simple.box-white{border:1px solid #4fbfa838;}
  .vsrow .team2{border-bottom:0;}
</style>
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
<!-- ROW 1 -->
<div class="row d-flex align-items-stretch same-height vsrow">
  <div class="col-md-5">
    <div class="box-simple box-white same-height">
      <div class="icon"><i class="fa fa-desktop"></i></div>
      <h4>Team 1</h4>
      <p></p>
    </div>
  </div>
  <div class="col-md-2">
    <div class="box-simple">
      <div class="icon-outlined" style="position:relative;top:25px;">VS</div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="box-simple box-white same-height">
      <div class="icon"><i class="fa fa-globe"></i></div>
      <h4>Campuran</h4>
      <p></p>
    </div>
  </div>
</div>
<!-- ROW 1 -->
<!-- ROW 2 -->
<div class="row d-flex align-items-stretch same-height vsrow">
  <div class="col-md-5">
    <div class="box-simple box-white same-height">
      <div class="icon"><i class="fa fa-desktop"></i></div>
      <h4>Team 2</h4>
      <p></p>
    </div>
  </div>
  <div class="col-md-2">
    <div class="box-simple">
      <div class="icon-outlined" style="position:relative;top:25px;">VS</div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="box-simple box-white same-height" style="height:auto; border-bottom: 0;">
      <div class="icon"><i class="fa fa-globe"></i></div>
      <h4>Campuran</h4>
      <p>4 Player Remaining</p>
    </div>
      <a href="#" class="btn btn-template-outlined btn-block">Assign</a>
  </div>
</div>
<!-- ROW 2 -->
</section>
@endsection