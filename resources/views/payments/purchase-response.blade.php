@extends('layouts.site')

@section('content')


<section class="main">
		<div class="inner">

			<h1>Gracias por tu compra!!</h1>
			<clean-cart :cart.sync="cart" :cart-sub-total.sync="cartSubTotal" :tax="tax" :cart-total.sync="cartTotal" ></clean-cart>
			
			
			<order :request="{{ $order }}" >Este es tu numero de orden</order>
		</div>
</section>

		
@endsection


