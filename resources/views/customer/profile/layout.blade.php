@extends('customer.layout')
@section('title')
Profile ·
@endsection
@section('style')
<style type="text/css">
.information *{margin:0;}
.information{font-size:14px; max-width: 75%; margin:6px auto;}
.img-circle{border-radius: 50%; max-width: 200px;}
</style>
@endsection
@section('content')
<div style="margin-top: 2%;" class="information text-center">
    <div class="text-center">
        <img border="0" class="img-circle" height="140" name="aboutme" src="https://shore-pro-tint.apptivate.it/assets/app/ionic/assets_dev/images/default_avatar.png" width="140"/>
    </div>
    <h3 class="media-heading">
    {{$user->name}}
    <small style="color: #ccc;">
    USA
    </small>
    </h3>
    <h4 style="color: #aaa;"><small>{{$user->email}}</small></h4>
    <p style="margin:6px; visibility: visible;">
        <strong>Reputasi </strong>
        <span class="badge badge-primary">1</span>
        &middot;
        <strong>Labels </strong>
        <span class="badge badge-warning">HTML5/CSS</span>
        <span class="badge badge-info">Adobe CS 5.5</span>
        <span class="badge badge-info">Microsoft Office</span>
        <span class="badge badge-success">Windows XP, Vista, 7</span>
    </p>
    <hr>
    <div class="text-center">
        <p style="visibility: hidden;">
            <strong>Bio:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.
            </br>
        </p>
    </div>
</div>
<!-- MENU NAV -->
<ul class="nav nav-tabs nav-fill">
    <li class="nav-item"><a class="nav-link {{($tabnav==0?'active':'')}}" href="/my">Dashboard</a></li>
    <li class="nav-item"><a class="nav-link {{($tabnav==1?'active':'')}}" href="/my/team">Team</a></li>
    <li class="nav-item"><a class="nav-link {{($tabnav==2?'active':'')}}" href="/my/booking">Booking</a></li>
    <li class="nav-item"><a class="nav-link {{($tabnav==3?'active':'')}}" href="/my/topup">Top Up</a></li>
    <!-- <li class="nav-item"><a class="nav-link disabled" href="#"></a></li> -->
</ul>
<div class="tab-content" style="min-height: 25vh;">
    @yield('profile-content')
</div>
@endsection