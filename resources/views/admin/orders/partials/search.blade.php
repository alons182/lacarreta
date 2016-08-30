
            <div class="filtros" >
               
               
                <form action="{{ URL::route('admin.orders.index') }}" method="GET" class="form-inline">
                	<div class="form-group">

                                
                                <input type="text" name="q" id="q" value="{{ $search }}" placeholder="Buscar por Factura o Cliente" class="form-control">
                               


                            </div>
                </form>
               
            </div>
