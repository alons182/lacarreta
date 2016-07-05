@extends('admin.layouts.admin')

@section('content')

	@include('admin/layouts/partials/breadcumbs', ['page' => 'Usuarios'])

	 <section class="panel">
        <div class="panel-heading">
        	<a href="{!! URL::route('user_register') !!}" class="btn btn-success">Nuevo Usuario</a>
           @include('admin/users/partials/search')    
        </div>
        <div class="panel-body no-padding">


                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Email</th>    
                                  <th>Created</th>
                                  
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{!! $user->id !!}</td>
                                    <td>{!! $user->name !!}
                                    <td>{!! $user->email !!}</td>
                                    <td class="center">{!! $user->created_at !!}</td>

                                    
                                    <td class="center">

                                        <a class="btn btn-info" href="{!! URL::route("admin.users.edit", [$user->id]) !!}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                         <button type="submit" class="btn btn-danger" form="form-delete" formaction="{!! URL::route("admin.users.destroy", [$user->id]) !!}">
                                            <i class="fa fa-trash-o"></i>
                                        </button>


                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                          <tfoot>

                                      @if ($users)
                                          <td  colspan="10" class="pagination-container">{!!$users->appends(['q' => $search])->render()!!}</td>
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
