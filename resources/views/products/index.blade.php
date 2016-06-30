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
				<aside class="main-sidebar">
					<div class="others-links">
						<nav class="secondary-menu">
							<ul class="secondary-menu-ul">
								<li class="secondary-menu-item"><a href="#" class="secondary-menu-link"><i class="icon-tags"></i>Productos en Oferta</a></li>
								<li class="secondary-menu-item"><a href="#" class="secondary-menu-link"><i class="icon-film"></i>Videos</a></li>
								<li class="secondary-menu-item"><a href="#" class="secondary-menu-link"><i class="icon-users"></i>Conozcanos</a></li>
								<li class="secondary-menu-item"><a href="#" class="secondary-menu-link"><i class="icon-calculator"></i>Cotizaciones</a></li>
								<li class="secondary-menu-item"><a href="#" class="secondary-menu-link"><i class="icon-file-text"></i>Promociones</a></li>
								<li class="secondary-menu-item"><a href="#" class="secondary-menu-link"><i class="icon-phone"></i>Contáctenos</a></li>
							</ul>
						</nav>
					</div>
				</aside>
			
		</div>
	</section>

	

		
@endsection

