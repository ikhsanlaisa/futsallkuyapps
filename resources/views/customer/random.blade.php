@extends('customer.layout')
@section('title')
Randomize
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('/vendor/spinkit/spinkit.css')}}">
@endsection
@section('content')
<div class="row">
	<div class="col-md-5 offset-md-4">
		<div id="randomContainer" style="min-height: 60vh; background-color: #fafafa; border-radius: 8px; margin:1% 0 2%; font-size: 86%;">
			
		</div>
		<div class="">
			<div class="col-md-12" style="min-height: 50px;">
				<button id="btnRandom" class="btn btn-block btn-default">Randomize</button>
				<div id="preloader">
					<div class="sk-chasing-dots" style="margin:10px auto;">
						<div class="sk-child sk-dot1"></div>
						<div class="sk-child sk-dot2"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	var preloader = $('#preloader');
	var btnSubmit = $('#btnRandom');
	var randomContainer = $('#randomContainer');
	$(window).ready(function(evt){
		btnSubmit.trigger('click');
	});

	btnSubmit.on('click', function(evt){
		evt.preventDefault();
		preloader.show()
		btnSubmit.hide()
		random();
	});

	function random(){
		$.get('/lobbies/randomize/generate', function(res,stats){
			console.log(res);
			randomContainer.html(res);
		})
		.done((res)=>{
			preloader.hide();
			btnSubmit.show();
		});
	}
</script>
@endsection