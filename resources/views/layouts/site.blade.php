<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('meta-title','La Carreta | Home')</title>
	<meta name="description" content="" />
	<link rel="shortcut icon" href="/img/favicons/favicon.ico">
	@yield('meta-share')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="{{ elixir('css/bundle.css') }}" rel="stylesheet"> 
</head>

<body>
	<section class="top">
		<div class="inner">
			<div class="top-account">
				
				<span>Bienvenido, 
 						@if (Auth::guest())
	                        puedes <a href="/login">loguearte</a> o <a href="/register">crearte una cuenta</a>
	                    @else
				 			{{ Auth::user()->name }}, <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
					 	@endif
				</span>
			</div>
			<search></search>
		</div>
	</section>
	<div class="clear"></div>
	<header class="header">
		<div class="inner relative">
			<div class="overflow">
				<a href="/" class="header-logo"><img src="/img/logo.png" alt="La Carreta" /></a>
			
			 <!--<a href="#" class="btn btn-cart header-btn-cart"><i class="icon-shopping-cart"></i>Carrito</a>-->
			
			<div class="header-services">
				<div class="header-services-item"><i class="icon-phone"></i> +(506) 9999 99 99</div>
				<div class="header-services-item"><i class="icon-truck"></i> Envio a todo Guanacaste</div>
				
			</div>
			</div>
			
			 <cart :cart.sync="cart" :cart-sub-total.sync="cartSubTotal" :tax="tax" :cart-total.sync="cartTotal" ></cart>
			<nav class="header-menu">
				<menu></menu>
				<!--<ul class="header-menu-ul">
                        <li class="header-menu-item">
                            <a href="/" class="header-menu-link">Inicio</a>
                        </li>
                        <li class="header-menu-item parent menu-item-has-children">
                            <a href="#" class="header-menu-link">Acabados</a>
                            <ul class="sub-menu">
                            	 <li class="sub-menu-item menu-item-has-children">
		                            <a href="#" class="sub-menu-link">Baños</a>
		                            <ul class="sub-menu">
		                            	 <li class="sub-menu-item">
				                            <a href="#" class="sub-menu-link">Baños</a>
				                        </li>
				                        <li class="sub-menu-item">
				                            <a href="#" class="sub-menu-link">Cocinas</a>
				                        </li>
				                        <li class="sub-menu-item">
				                            <a href="#" class="sub-menu-link">Griferias</a>
				                        </li>
		                            </ul>
		                        </li>
		                        <li class="sub-menu-item">
		                            <a href="#" class="sub-menu-link">Cocinas</a>
		                        </li>
		                        <li class="sub-menu-item">
		                            <a href="#" class="sub-menu-link">Griferias</a>
		                        </li>
                            </ul>
                        </li>
                        <li class="header-menu-item">
                            <a href="/products/0002" class="header-menu-link">Tornilleria</a>
                        </li>
                        <li class="header-menu-item">
                            <a href="/products/0003" class="header-menu-link">PVC</a>
                        </li>
                        <li class="header-menu-item">
                            <a href="/products/0004" class="header-menu-link">Laminas</a>
                        </li>
                        <li class="header-menu-item">
                            <a href="/products/0005" class="header-menu-link">Aceros</a>
                        </li>
                        <li class="header-menu-item">
                            <a href="/products/0006" class="header-menu-link">Herramientas</a>
                        </li>
                        <li class="header-menu-item">
                            <a href="/products/0007" class="header-menu-link">Jardineria</a>
                        </li>
                        <li class="header-menu-item">
                            <a href="/products/0009" class="header-menu-link">Pinturas</a>
                        </li>
                        <li class="header-menu-item">
                            <a href="/products/0011" class="header-menu-link">Maderas</a>
                        </li>
                        <li class="header-menu-item">
                            <a href="/products/0012" class="header-menu-link">Cerrajeria</a>
                        </li>
                        
                    </ul>-->
			</nav>
			 <button id="btn-menu" class="header-btn-menu">
	            <i class="icon-menu"></i>
	        </button>
		</div>
	</header>

	 @yield('content')	
	
	<footer class="footer">
		<div class="footer-top">
			<div class="inner">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur a placeat cumque quo animi.
			</div>
		</div>
		<div class="footer-bottom">
			<div class="copy">
				Deposito de materiales La Carreta &copy; 2016. <a href="#"><i class="icon-avotz"></i></a>
			</div>
		</div>
	</footer>
	@if (session()->has('flash_message'))

	<alert type="{!! session()->get('flash_message_level') !!}" important>{!! session()->get('flash_message') !!}</alert>

    @endif
	<div class="alert messageCart" v-show="messageCart">@{{ messageCart }}</div>
	<script src="{{ elixir('js/app.js') }}"></script>
	<script src="{{ elixir('js/bundle.js') }}"></script>
	@yield('scripts')
	
</body>

</html>
