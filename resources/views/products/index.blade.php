@extends('layouts.site')

@section('content')

<section class="main">
		<div class="inner">

				<div class="main-content">
		
					<div class="featured-products">
							<h1>Productos</h1>
							
							<products  :cart="cart" :cart-sub-total.sync="cartSubTotal" :tax="tax" :cart-total.sync="cartTotal" filter-category="{{ $category }}" limit-products="9" show-pagination="1"></products>

							
					</div>
					

				</div>
				@include('layouts/partials/sidebar')
			
		</div>
	</section>

	

		
@endsection

