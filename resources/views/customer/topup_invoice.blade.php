<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
rel="stylesheet">
<script src="http://staging.doku.com/doku-js/assets/js/doku.js"></script>
<link href="http://staging.doku.com/doku-js/assets/css/doku.css" rel="stylesheet">

<!-- <script type="text/javascript">
$(function() {
var data = new Object();
data.req_merchant_code = '{{$params->mallid}}';
data.req_chain_merchant = 'NA';
data.req_payment_channel = '{{$params->channel}}';
data.req_transaction_id = '{{$params->invoice}}';
data.req_currency = '{{$params->currency}}';
data.req_amount = '{{$params->amount}}';
data.req_words = '{{$params->words}}';
data.req_form_type = 'full';
getForm(data);
});
</script>

<form action="charge.php" method="POST" id="payment-form">
<div doku-div='form-payment'>
<input id="doku-token" name="doku-token" type="hidden" />
<input id=" doku-pairing-code" name="doku-pairing-code" type="hidden" />
</div>
</form> -->

<?php date_default_timezone_set("Asia/Jakarta"); ?>

@if($params->channel=="0001")
<form action="/topup/order" method="post" id="form1" name="form1">
@else
<form action="http://staging.doku.com/Suite/Receive" method="post" id="form1" name="form1">
@endif
<input name="MALLID" type="hidden" value="{{$params->mallid}}" >
<input name="BASKET" type="hidden" value="testing item,10000.00,1,10000.00" >
<input name="CHAINMERCHANT" type="hidden" value="NA" >
<input name="AMOUNT" type="hidden" value="{{$params->amount}}" >
<input name="PURCHASEAMOUNT" type="hidden" value="{{$params->amount}}" >
<input name="TRANSIDMERCHANT" type="hidden" value="{{$params->invoice}}" >
<input name="WORDS" type="hidden" value="{{$params->words}}" >
<input name="CURRENCY" type="hidden" value="360" >
<input name="PURCHASECURRENCY" type="hidden" value="360" >
<input name="COUNTRY" type="hidden" value="ID" >
<input name="SESSIONID" type="hidden" value="<?=date('Ymdhis')?>" >
<input name="REQUESTDATETIME" type="hidden" value="<?=date('Ymdhis')?>" >
<input name="NAME" type="hidden" value="John Doe" >
<input name="EMAIL" type="hidden" value="customer@domain.com">
<input name="PAYMENTCHANNEL" type="hidden" value="{{$params->channel}}" >

<p>Invoice: {{$params->invoice}}</p>
<p>Amount: Rp{{$params->amount}}</p>
<p>User: {{$user->name}}</p>
<p>Email: {{$user->email}}</p>
<p>Saldo: Rp{{$user->saldo}}</p>
{{csrf_field()}}
@if($params->channel=="0001")
<button type="submit" class="btn btn-primary">Bayar Ke Kasir</button>
@else
<button type="submit" class="btn btn-primary">Process</button>
@endif
</form>