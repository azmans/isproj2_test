@extends('layouts.index')

@section('title', 'Dianne | Welcome')

@section('content')

	<!-- Jumbotron -->

	<div class="jumbotron">
		<div class="container-fluid">
			<img src="img/showcase.png">
			<div class="jumbotron-caption">
				<h1 class="display-2">Dianne</h1>
				<h3>Your wedding planner assistant</h3>
			</div>
			<a href="/register">
			<button type="button" class="btn button_1 btn-lg" id="signup">
				Sign Down
			</button>
			</a>
			<a href="/vendor/register">
				<button type="button" class="btn button_1 btn-lg" id="subscribe">
					Subscribe to be a Vendor
				</button>
			</a>

		</div>
	</div>

	<!-- Soon-to-Wed Features -->

	<div class="container-fluid padding">
		<div class="row features text-center">
			<div class="col-12">
				<h2 class="display-4">Soon-to-Wed Features</h2>
			</div>
		</div>
		<hr>
		<div class="col-12">
			<p class="lead">Sign up now and get these features!</p>
		</div>
	</div>

	<div class="container-fluid padding">
		<div class="row text-center padding stwfeatures">
			<div class="col-xs 12 col-sm-6 col-md-4">
				<img src="./img/calculations.png" alt="track budget">
				<h4>Track your Wedding Budget</h4>
			</div>
			<div class="col-xs 12 col-sm-6 col-md-4">
				<img src="./img/guestlist.png"alt="guest list">
				<h4>Create Your Guest List</h4>
			</div>
			<div class="col-sm 12 col-md-4">
				<img src="./img/browse.png" class="feature-icon" alt="browse">
				<h4>Browse Vendors</h4>
			</div>
		</div>
		<div class="row text-center padding stwfeatures">
			<div class="col-xs 12 col-sm-6 col-md-4">
				<img src="./img/requestbooking.png"alt="request booking">
				<h4>Request Booking with a Vendor</h4>
			</div>
			<div class="col-xs 12 col-sm-6 col-md-4">
				<img src="./img/pay.png" alt="pay vendor">
				<h4>Pay the Vendors</h4>
			</div>
			<div class="col-sm 12 col-md-4">
				<img src="./img/rate.png" alt="rate">
				<h4>Rate Vendors</h4>
			</div>
		</div>
		<hr class="my-4">
	</div>


	<div class="container-fluid padding">
		<div class="row padding">
			 <div class="col-lg-6" id="subscribevendor">
				 <h2>Subscribe to be a Vendor!</h2>
				 <br>
				 <p>For only <strong>p500</strong> a month<br>
					 you can gain clients for your business!</p>
				 <p>Reach soon-to-wed couples easily with Dianne!</p>
				 <br>
				 <a href="/vendor/register">
					 <button type="submit" class="button_1">Subscribe to be a Vendor</button>
				 </a>
			 </div>
			<div class="col-lg-4">
				<img src="" class="img-fluid" alt="vendor image">
			</div>
		</div>
	</div>


</body>
</html>
@endsection