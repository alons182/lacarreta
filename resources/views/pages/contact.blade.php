@extends('layouts.site')

@section('content')
	
<section class="main">
		<div class="inner">

			<div class="main-content">
		
					<h1 class="contact-title">Contáctenos</h1>
					 <p class="intro">"Llamanos o escribínos para solucionar cualquier duda o consulta que tengas, en <b>Deposito de Materiales La Carreta</b> estamos para servirte !! Responderemos tus consultas en menos de 72 horas.
			                "</p>
					<address class="contact-address">
			            <h2 class="contact-address-title">Horario de atención</h2>
			            De Lunes a Sabado de 08:00 am a 5:00 pm<br/>

			            <span><b>Email:</b> info@grupolacarretacr.com</span><br/>
			            <span><b>Telefono:</b> 2690 9300 | 2665 0568</span>
			            <div class="contact-social">
			                <a class="contact-social-link" href="#" target="_blank"><i class="icon-facebook"></i></a>
			                <a class="contact-social-link" href="#" target="_blank"><i class="icon-twitter"></i></a>
			                <a class="contact-social-link" href="#" target="_blank"><i class="icon-youtube"></i></a>
			                <a class="contact-social-link" href="#" target="_blank"><i class="icon-google-plus"></i></a>
			            </div>
			        </address>
			         <div class="form contact-form">
	            
			           

			            <form class="form-horizontal form-contact" role="form" method="POST" action="{{ url('/contact') }}">
		                            {{ csrf_field() }}

		                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		                                <label for="name" class="col-md-4 control-label">Nombre</label>

		                                <div class="col-md-6">
		                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

		                                    @if ($errors->has('name'))
		                                        <span class="help-block">
		                                            <strong>{{ $errors->first('name') }}</strong>
		                                        </span>
		                                    @endif
		                                </div>
		                            </div>

		                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		                                <label for="email" class="col-md-4 control-label">E-Mail</label>

		                                <div class="col-md-6">
		                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

		                                    @if ($errors->has('email'))
		                                        <span class="help-block">
		                                            <strong>{{ $errors->first('email') }}</strong>
		                                        </span>
		                                    @endif
		                                </div>
		                            </div>

		                            <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
		                               <label for="comments" class="col-md-4 control-label">Comentario</label>

		                                <div class="col-md-6">
		                                	<textarea name="comments" id="comments" cols="30" rows="10"></textarea>
		                                   

		                                    @if ($errors->has('comments'))
		                                        <span class="help-block">
		                                            <strong>{{ $errors->first('comments') }}</strong>
		                                        </span>
		                                    @endif
		                                </div>
		                            </div>

		                            <div class="form-group">
		                                <div class="col-md-6 col-md-offset-4">
		                                    <button type="submit" class="btn btn-primary">
		                                        Enviar
		                                    </button>
		                                </div>
		                            </div>
		                        </form>
			           
			        </div>
						


				</div>
				@include('layouts/partials/sidebar')




			

	       

		</div>
</section>
@endsection
