@extends('layouts.site')

@section('content')


<section class="main">
		<div class="inner">

			<product :cart="cart" :cart-sub-total.sync="cartSubTotal" :tax="tax" :cart-total.sync="cartTotal" codigo="{{ $codigo }}" ></product>

			
			<hr class="hr">
			<h1>Otros Productos Relacionados</h1>
							
			<products  :cart="cart" :cart-sub-total.sync="cartSubTotal" :tax="tax" :cart-total.sync="cartTotal" 
					   filter-category="{{ $category }}" limit-products="3"></products> 
			
		</div>
</section>


		
	

		
@endsection


