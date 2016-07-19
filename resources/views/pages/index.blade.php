@extends('layouts.site')

@section('content')

@include('layouts/partials/banner')

<section class="main">
		<div class="inner">

				<div class="main-content">
		
					<div class="featured-products">
							<h1>Productos Destacados</h1>
							
							<products  :cart="cart" :cart-sub-total.sync="cartSubTotal" :tax="tax" :cart-total.sync="cartTotal" filter-products="0035" limit-products="6" ></products>
							
						</div>
						


				</div>
				@include('layouts/partials/sidebar')
			
		</div>
	</section>

	

		
@endsection

