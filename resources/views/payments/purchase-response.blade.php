@extends('layouts.site')

@section('content')


<section class="main">
		<div class="inner">

			<h1>Gracias por tu compra!!</h1>
			<clean-cart :cart.sync="cart" :cart-sub-total.sync="cartSubTotal" :tax="tax" :cart-total.sync="cartTotal" ></clean-cart>
			<p>Este es tu numero de orden {{ $order }} </p>
			
			<order :request="{{ $data }}"></order>
		</div>
</section>

		
@endsection


