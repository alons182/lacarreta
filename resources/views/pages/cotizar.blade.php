@extends('layouts.site')

@section('content')
	
<section class="main">
		<div class="inner">

			<div class="main-content">
		
					<h1 class="contact-title">Cotizar</h1>
					 <p class="intro">En esta sección vas a poder mandarnos tus cotizaciones, ya sea que nos escribas los artículos en la sección de comentarios o que subas un archivo con los materiales que necesitas cotizar. En Depósito de Materiales La Carreta, estamos para servirte!!
			                </p>
					
			         <div class="form cotizar-form">
	            
			           

			            <form class="form-horizontal form-contact" role="form" method="POST" action="{{ url('/cotizar') }}" enctype="multipart/form-data">
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
		                            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
		                                <label for="file" class="col-md-4 control-label">Archivo (jpg, png, txt, excel, word, pdf)</label>

		                                <div class="col-md-6">
		                                    <input id="file" type="file" class="form-control" name="file">

		                                    @if ($errors->has('file'))
		                                        <span class="help-block">
		                                            <strong>{{ $errors->first('file') }}</strong>
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
