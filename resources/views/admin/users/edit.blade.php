@extends('admin.layouts.admin')

@section('content')

	@include('admin/layouts/partials/breadcumbs', ['page' => 'Usuarios'])

	 <form method="POST" action="{{ URL::route('admin.users.update', $user->id ) }}" class="form-horizontal">
         {{ csrf_field() }}<input name="_method" type="hidden" value="PUT">
         @include('admin/users/partials/form',['buttonText' => 'Actualizar Usuario'])
   </form>
		
@endsection
