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
                                @foreach ($order->details as $line)
                                <tr class="product"> 

                                  <td class="align-center">{{ $line->Descripcion }}</td> 
                                  <td class="align-center">{{ $line->Cant_Facturada }}</td> 
                                  <td>{{ money(($line->Precio_Venta - $line->Monto_Descuento) + $line->Total_Impuesto ,'¢' ) }} <span class="ivi">I.V.I</span></td> 
                                  <td>{{ money($line->Total, '¢' )  }}</td> 
                                </tr>

                                @endforeach
                                <tr>
                                    <td colspan="2" rowspan="4"></td>
                                    <td colspan="1" class="text-right">Subtotal</td>
                                    <td class="text-left">{{ money($order->Total_Factura,'¢') }}</td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="text-right">Envio</td>
                                    <td>{{ money($envio,'¢') }}</td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="text-right">Total</td>
                                    <td>{{ money($order->Total_Factura + $envio,'¢') }}</td>
                                </tr>

                              </tbody> 
                        </table>
                      
                    </div>
                  
                          <input type="hidden" name="order" value="{{ $order->id }}">
                    
                   
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Ejecutar Pago
                    </button>
                        

          </form>
        
      </div>
			
			
			
		</div>
</section>

		
@endsection


