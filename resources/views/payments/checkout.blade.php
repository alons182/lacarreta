@extends('layouts.site')

@section('content')


<section class="main">
		<div class="inner">

			<h1>Resumen</h1>
			<cart :cart.sync="cart" :cart-sub-total.sync="cartSubTotal" :tax="tax" :cart-total.sync="cartTotal" type="full" ></cart>
		</div>
</section>

		
@endsection


