@extends('admin.layouts.admin')

@section('content')

	@include('admin/layouts/partials/breadcumbs', ['page' => 'Ordenes'])

	 <section class="panel">
        <div class="panel-heading">
        	   @include('admin/orders/partials/search')
              
        </div>
        <div class="panel-body no-padding">


                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Numero Factura</th>
                                  <th>Cliente</th>    
                                  <th>Monto Factura</th>
                                  <th>Total Descuento</th>  
                                  <th>Total Impuesto</th>  
                                  <th>Total Factura</th>     
                                  <th>Created</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{!! $order->id !!}</td>
                                    <td>{!! $order->N_Factura !!}
                                    <td>{!! $order->Descrip_Cliente !!}</td>
                                    <td>{!! money($order->Monto_Factura, '¢' ) !!}</td>
                                    <td>{!! money($order->Total_Descuento, '¢' ) !!}</td>
                                    <td>{!! money($order->Total_Impuesto, '¢' ) !!}</td>
                                    <td>{!! money($order->Total_Factura, '¢' ) !!}</td>
                                    <td class="center">{!! $order->created_at !!}</td>

                                    
                                    <td class="center">

                                        <a class="btn btn-info" href="{!! URL::route("admin.orders.show", [$order->id]) !!}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                         <button type="submit" class="btn btn-danger" form="form-delete" formaction="{!! URL::route("admin.orders.destroy", [$order->id]) !!}">
                                            <i class="fa fa-trash-o"></i>
                                        </button>


                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                          <tfoot>

                                      @if ($orders)
                                          <td  colspan="10" class="pagination-container">{!!$orders->appends(['q' => $search])->render()!!}</td>
                                           @endif


                                  </tfoot>
                      </table>


                </div>
        </div>
     </section>




<form id="form-active-inactive" method="post">
  {{ csrf_field() }}
</form>
<form method="post" id="form-delete" data-confirm="Estas Seguro?">
  <input name="_method" type="hidden" value="DELETE">{{ csrf_field() }}
</form>
		
@endsection
