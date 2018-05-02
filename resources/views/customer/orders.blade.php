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
	.row-item-detail .detail-place{}
		.row-item-detail .detail-place h5{margin: 0;}
		.row-item-detail .detail-place h6{margin-right: 5px;}
	.row-item-detail .detail-ad{}
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
?>

<div style="margin-top: 2%;"></div>
<section>
	<div id="container">
		<div class="row">
			<div class="col-md-3">
				<!-- Display Profile -->
				<div style="margin:0 5px 20px;">
					<div class="bottom d-flex align-items-center justify-content-between align-self-end">
						<div class="profile-info d-flex">
							<div class="title">
								<h5>John McIntyre</h5>
								<p>Team Makan</p>
							</div>
							<div class="avatar"><img style="height: 90px;" alt="" src="{{asset('images/admin.jpg')}}" class="img-fluid"></div>
						</div>
					</div>
				</div>
				<!-- Side Navigation -->
				<ul class="nav nav-pills flex-column text-sm">
					<li class="nav-item"><a href="#contact.html" class="nav-link">My Booking</a></li>
					<li class="nav-item"><a href="#text.html" class="nav-link">Pengaturan Akun</a></li>
					<li class="nav-item"><a href="#faq.html" class="nav-link">Bantuan</a></li>
				</ul>
			</div>
			<div class="col-md-8">
				
				<!-- Tab Navigation -->
				<div>
					<nav id="myTab" role="tablist" class="nav nav-tabs">
						<a id="tab-1" data-toggle="tab" href="#tab1" role="tab" class="nav-item nav-link active show">Pemesanan Aktif</a>
						<a id="tab-2" data-toggle="tab" href="#tab2" role="tab" class="nav-item nav-link">Riwayat Pemesanan</a>
						<!-- <a id="tab4-5-tab" data-toggle="tab" href="#tab4-5" role="tab" aria-controls="tab4-5" aria-selected="false" class="nav-item nav-link">Second tab</a> -->
					</nav>
					<div id="nav-tabContent" class="tab-content" style="">
						<div id="tab1" role="tabpanel" aria-labelledby="tab4-4-tab" class="tab-pane fade active show">
							<div id="accordion" role="tablist" class="mb-5">
								@foreach($items as $r => $item)
								<!-- ROW ITEM -->
								<div class="card">
									<div role="tab" class="card-header">
										<a data-toggle="collapse" href="#row-1-{{$r}}" class="collapsed" style="display: block;">
											<span><i class="fa fa-reorder"></i>  {{$item->tempat->title}} &mdash; {{$item->date_created}}</span>
											<span class="float-lg-right"><i class="fa fa-bookmark"></i> <i>{{$item->id}}</i></span>
										</a>
									</div>
									<div id="row-1-{{$r}}" role="tabpanel" data-parent="#accordion" class="collapse <?= $r==0?'show':'' ?>" style="">
										<div class="card-body">
											<div class="row row-item-detail">
												<div class="col-md-2 detail-place-img">
													<div class="icon-outlined"><i class="fa fa-map-marker"></i></div>
												</div>
												<div class="col-md-7 detail-place">
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
												<div class="col-md-3 detail-ad">
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
									</div>
								</div>
								<!-- ROW ITEM -->
								<?php if($r==2){break;} ?>
								@endforeach
							</div>
						</div>
						<!-- Tab Riwayat Pemesanan -->
						<div id="tab2" role="tabpanel" class="tab-pane fade show">
							<div id="accordion2" role="tablist" class="mb-5">
								@foreach($items as $r => $item)
								<!-- ROW ITEM -->
								<div class="card">
									<div role="tab" class="card-header">
										<a data-toggle="collapse" href="#row-2-{{$r}}" class="collapsed" style="display: block;">
											<span><i class="fa fa-reorder"></i>  {{$item->tempat->title}} &mdash; {{$item->date_created}}</span>
											<span class="float-lg-right"><i class="fa fa-bookmark"></i> <i>{{$item->id}}</i></span>
										</a>
									</div>
									<div id="row-2-{{$r}}" role="tabpanel" data-parent="#accordion2" class="collapse <?= $r==0?'show':'' ?>" style="">
										<div class="card-body">
											<div class="row row-item-detail">
												<div class="col-md-2 detail-place-img">
													<div class="icon-outlined"><i class="fa fa-map-marker"></i></div>
												</div>
												<div class="col-md-7 detail-place">
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
												<div class="col-md-3 detail-ad">
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
									</div>
								</div>
								<!-- ROW ITEM -->
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection