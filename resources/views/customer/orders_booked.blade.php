@extends('customer.layout')
@section('title')
My Orders
@endsection
@section('style')
<style type="text/css">
	.profile-info{}
	.profile-info .title{padding: 5px;}
	.profile-info .avatar{padding: 5px;}
	.row-item-detail{}
	.row-item-detail .detail-place-img{}
	.row-item-detail .detail-place{margin: 3% 0 0 0;}
		.row-item-detail .detail-place h5{margin: 0;}
		.row-item-detail .detail-place h6{margin-right: 5px;}
	.row-item-detail .detail-ad{margin: 5% 0 0 0;}
		.row-item-detail .detail-ad h6{margin:0; text-transform: uppercase;}
		.row-item-detail .detail-ad p{margin:0 0 8px;}
</style>
@endsection
@section('content')
<?php
$json_booking = '[
	{
		"id": "AAFFFF00",
		"status": "Waiting",
		"date_created": "21 April 2018",
		"user": "Vlad II",
		"team": "RajawaliTEAM",
		"tarif": 34500,
		"jadwal": "KAMIS, 13 Apr 2018 07:00",
		"tempat": {
			"id": 6,
			"title": "Rajawali Futsal",
			"addr": "Citeureup, Dayeuhkolot, Bandung, West Java 40257"
		}
	},
	{
		"id": "AABBFF00",
		"status": "Ready",
		"date_created": "22 April 2018",
		"user": "Vlad II",
		"team": "RajawaliTEAM",
		"tarif": 34500,
		"jadwal": "KAMIS, 13 Apr 2018 17:00",
		"tempat": {
			"id": 6,
			"title": "Rajawali Futsal",
			"addr": "Citeureup, Dayeuhkolot, Bandung, West Java 40257"
		}
	},
	{
		"id": "AAFF0000",
		"status": "Playing",
		"date_created": "23 April 2018",
		"user": "Vlad II",
		"team": "RajawaliTEAM",
		"tarif": 34500,
		"jadwal": "KAMIS, 13 Apr 2018 20:00",
		"tempat": {
			"id": 4,
			"title": "Centro Futsal",
			"addr": "Jl. Margacinta No.48, Cijaura, Buahbatu, Kota Bandung, Jawa Barat 40286"
		}
	},
	{
		"id": "AAFAFFA0",
		"status": "Done",
		"date_created": "15 April 2018",
		"user": "Vlad II",
		"team": "BossTEAM",
		"tarif": 34500,
		"jadwal": "KAMIS, 13 Apr 2018 10:00",
		"tempat": {
			"id": 2,
			"title": "Bos Futsal",
			"addr": "Jl. Cikoneng, Bojongsoang, Bandung, Jawa Barat 40288"
		}
	},
	{
		"id": "AAF6F501",
		"status": "Canceled",
		"date_created": "21 April 2018",
		"user": "Vlad II",
		"team": "BossTEAM",
		"tarif": 34500,
		"jadwal": "KAMIS, 13 Apr 2018 14:00",
		"tempat": {
			"id": 5,
			"title": "Bisoc Futsal",
			"addr": "Jl. Batununggal Lestari No.1, Batununggal, Bandung Kidul, Kota Bandung, Jawa Barat 40266"
		}
	}
]';
$items = json_decode($json_booking);
$item = $items[4];
$server = "http://".getHostByName(getHostName());
$code = $server."/confirm/".$item->id;
?>
<div class="container">
<div class="row" style="margin-top: 7%;">
	<div class="col-md-1"></div>
	<div class="col-md-10" style="padding:20px; border:2px dashed #545454; border-radius: 10px;">
		<div class="book-detail">
			<div class="row row-item-detail">
				<div class="col-md-4 detail-place-img" style="">
					<div class="icon-outlined">
						<div id="qrcode" style="display: inline-block; margin:1% auto;"></div>
					</div>
				</div>
				<div class="col-md-6 detail-place">
					<h4>{{$item->tempat->title}}</h4>
					<p>{{$item->tempat->addr}}</p>
					<hr/>
					<div class="row">
						<div class="col-md-7">
							<h5>Jadwal</h5> <p>{{$item->jadwal}}</p>
						</div>
						<div class="col-md-5" style="text-align: left;">
							<h6><i class="fa fa-user-circle"></i> {{$item->user}}</h6>
							<h6><i class="fa fa-group"></i> {{$item->team}}</h6>
						</div>
					</div>
				</div>
				<div class="col-md-2 detail-ad">
					<h6>NO. Pemesanan</h6>
					<p>{{$item->id}}</p>
					<h6>Status Main</h6>
					<p>{{$item->status}}</p>
					<!-- Canceled | Waiting | Ready | Playing | Done -->
					<h6>Tarif Bayar</h6>
					<p>{{$item->tarif}}/Jam</p>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center" style="margin: 4% 0;">
		<a href='/lobby' class="btn btn-primary" style="width: 30%;">Konfirmasi Pemesanan <i class="fa fa-check-circle"></i></a>
	</div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/jquery.qrcode.min.js')}}"></script>
<script type="text/javascript">
	$('#qrcode').qrcode({width: 250,height: 250,text: "{{$code}}"});
</script>
@endsection