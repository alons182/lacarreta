@extends('layouts.site')

@section('content')


<section class="main">
		<div class="inner">

			<h1 class="text-center">Resumen de la Orden</h1>
      <div class="order-summary">

           <form class="form-horizontal" role="form" method="POST" action="{{ url('/purchase-response') }}">
                     <!--{{ csrf_field() }}-->
                     <div class="general-info">
                       
                       <div class="info-user">
                         <h4>Información de Cliente</h4>
                          {{ auth()->user()->name }}<br/>
                          {{ auth()->user()->email }}<br/>
                          (506) 8967-9098
                     
                       </div>
                       <div class="info-company">
                         <img src="/img/logo.png" alt="La carreta">
                       </div>


                     </div>
                     
                   
                    <div class="table-responsive">
                        <table class="table table-striped"> 
                              <thead>
                                <tr>
                                  <th>Articulo</th>
                                  <th>Cantidad</th>
                                  <th>Precio</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                              <tbody> 
                                @foreach ($products as $product)
                                <tr class="product"> 

                                  <td class="align-center">{{ $product->descripcion }}</td> 
                                  <td class="align-center">{{ $product->quantity }}</td> 
                                  <td>{{ money($product->precio,'¢' ) }}</td> 
                                  <td>{{ money($product->precio * $product->quantity, '¢' )  }}</td> 
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" rowspan="4"></td>
                                    <td colspan="1" class="text-right">Subtotal</td>
                                    <td class="text-left">{{ money($subtotal,'¢') }}</td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="text-right">Envio</td>
                                    <td>{{ money($envio,'¢') }}</td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="text-right">Total</td>
                                    <td>{{ money($total,'¢') }}</td>
                                </tr>

                              </tbody> 
                        </table>
                      
                    </div>
                  
                              <input type="hidden" value="0080000039" name="N_Factura" /> 
                              <input type="hidden" value="" name="Codigo_Cliente" /> 
                              <input type="hidden" value="{{ auth()->user()->name }}" name="Descrip_Cliente" />  
                              <input type="hidden" value="0080" name="Codigo_Responsable" />  
                              <input type="hidden" value="002" name="Codigo_Bodega" />  
                              <input type="hidden" value="{{ $subtotal }}" name="Monto_Factura" />  
                              <input type="hidden" value="00003" name="Tipo_Documento" />  
                              <input type="hidden" value="13" name="Tasa_Impuesto" />  
                              <input type="hidden" value="0" name="Total_Descuento" /> 
                              <input type="hidden" value="0" name="Total_Exento" />  
                              <input type="hidden" value="{{ $subtotal }}" name="Total_Gravado" />  
                              <input type="hidden" value="{{ $total }}" name="Total_Factura" />  
                              <input type="hidden" value="0" name="Total_Impuesto" /> 
                              <input type="hidden" value="001" name="Codigo_Condicion" />  
                              <input type="hidden" value="0080" name="Codigo_Vendedor" />  
                              <input type="hidden" value="{{count($products)}}" name="Total_Lineas" />  
                     
                   
                    
                   
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Ejecutar Pago
                    </button>
                        

          </form>
        
      </div>
			
			
			
		</div>
</section>

		
@endsection


