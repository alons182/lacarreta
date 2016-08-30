@extends('admin.layouts.admin')

@section('content')

	@include('admin/layouts/partials/breadcumbs', ['page' => 'Ordenes'])

	 <section class="panel">
        <div class="panel-heading">
        	  <header class="header navbar">
                    <p class="navbar-text pull-left"> Orden N° {{ $order->N_Factura }}</p>

                    <div class="pull-right">
                        <p class="navbar-text pull-left mg-r-xs">
                            Actions:
                        </p>
                        <div class="btn-group mg-r" data-toggle="buttons">
                            <label class="btn btn-default btn-sm navbar-btn">
                                <input type="radio" name="options" id="option1">
                                <i class="fa fa-print"></i>
                            </label>
                            <label class="btn btn-default btn-sm navbar-btn">
                                <input type="radio" name="options" id="option2">
                                <i class="fa fa-cloud-download"></i>
                            </label>
                        </div>
                    </div>

                </header>
              
        </div>
        <div class="panel-body ">
               
                   
                        
                           
                                    <div class="mg-b-lg clearfix">

                                        <div class="pull-left">
                                            <address>
                                                <strong>{{ $order->user->name }}</strong>
                                                <br>{{ $order->user->email }}
                                                <br>
                                                <abbr title="Phone">Tel:</abbr>(506) 456-7890
                                            </address>


                                        </div>

                                        <div class="pull-right">
                                            <img src="/img/logo.png" alt="" style="max-width: 250px;width: 100%;">
                                        </div>
                                    </div>

                                    <div class="mg-b-lg clearfix">

                                        <div class="pull-left ">
                                            <p>Fecha: {{ $order->created_at }}</p>
                                            <h3 class="text-uppercase">Orden N° {{ $order->N_Factura }}</h3>
                                            
                                        </div>
                                    </div>


                                    <div class="panel panel-default">
                                        <div class="panel-heading">Resumen de la Orden</div>
                                        <div class="panel-body no-padding">
                                            <div class="table-responsive">
                                                <table class="table">
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
                                           

                                        </div>
                                    </div>
                               
                    
                
                
               
        </div>
     </section>

		
@endsection
