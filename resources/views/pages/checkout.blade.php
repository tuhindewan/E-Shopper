@extends('welcome')

@section('home_content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Check out</li>
			</ol>
		</div><!--/breadcrums-->


		<div class="register-req">
			<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
		</div><!--/register-req-->

		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-12 clearfix">
					<div class="bill-to">
						<p>Shipping Details</p>
						<div class="form-one">
							<form action="{{ url('/save_shipping_details') }}" method="post">
								{{ csrf_field() }}
								<input type="text" name="shipping_mail" placeholder="Email*">
								<input type="text" name="shipping_firstname" placeholder="First Name *">
								<input type="text" name="shipping_lastname" placeholder="Last Name *">
								<input type="text" name="shipping_address" placeholder="Address *">
								<input type="text" name="shipping_number" placeholder="Mobile Number">
								<input type="text" name="shipping_city" placeholder="City">
								<button type="submit">Done</button>
							</form>
						</div>
					</div>
				</div>				
			</div>
		</div>
		<div class="review-payment">
			<h2>Review & Payment</h2>
		</div>
	</div>
</section> <!--/#cart_items-->
@endsection