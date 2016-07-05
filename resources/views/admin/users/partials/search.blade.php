
            <div class="filtros" >
               
               
                <form action="{{ URL::route('admin.users.index') }}" method="GET" class="form-inline">
                	<div class="form-group">

                                
                                <input type="text" name="q" id="q" value="{{ $search }}" placeholder="Buscar Usuario" class="form-control">
                               


                            </div>
                </form>
               
            </div>
