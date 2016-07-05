<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					 <a href="{!! URL::route('dashboard') !!}">Inicio</a>
					 <i class="icon-angle-right"></i>
				</li>
				@if(isset($page))
				    <li><a href="#">{!! $page !!}</a></li>
				@else
				    <li><a href="#">Dashboard</a></li>
				    @endif
			</ul>