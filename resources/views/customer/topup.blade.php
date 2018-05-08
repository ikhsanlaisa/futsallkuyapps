@extends('customer.layout')
@section('title')
Top Up
@endsection
@section('style')
@endsection
@section('content')
<?php
$topup_amount = [10000, 25000, 50000, 100000, 250000];
$topup_method = '[
	{"name": "Credit Card", "key": "15"},
	{"name": "Doku Wallet", "key": "04"},
	{"name": "Mandiri Clickpay", "key": "02"},
	{"name": "Permata Bank or ATM Bersama", "key": "05"},
	{"name": "CASH ON SITE", "key": "0001"}
]';
$topup_method = json_decode($topup_method);

// var_dump($user);
?>
<div class="">
	
	<div>
		<b>{{$user->name}}</b><br/>
		Saldo <b>Rp0</b>
	</div>

	<form action="/topup/invoice/" method="post">
		<div class="form-group">
			<label for="topup_amount">Select Top-up Amount</label>
			@foreach($topup_amount as $amount)
			<div class="form-check">
				<input class="form-check-input" type="radio" name="topup_payment_amount" id="AMOUNT{{$amount}}" value="{{$amount}}">
				<label class="form-check-label" for="AMOUNT{{$amount}}">
					Rp{{$amount}}
				</label>
			</div>
			@endforeach
		</div>

		<div class="form-group">
			<label for="topup_amount">Select Payment Method</label>
			@foreach($topup_method as $method)
			<div class="form-check">
				<input class="form-check-input" type="radio" name="topup_payment_method" id="METHOD{{$method->key}}" value="{{$method->key}}">
				<label class="form-check-label" for="METHOD{{$method->key}}">
					{{$method->name}}
				</label>
			</div>
			@endforeach
		</div>
		
		{{csrf_field()}}
		<button type="submit" class="btn btn-primary">Top Up</button>
	</form>
</div>
@endsection