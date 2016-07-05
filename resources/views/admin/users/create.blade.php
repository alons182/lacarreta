@extends('admin.layouts.admin')

@section('content')

	@include('admin/layouts/partials/breadcumbs', ['page' => 'Usuarios'])

	 <form method="POST" action="{{ URL::route('admin.users.store') }}" class="form-horizontal">
         {{ csrf_field() }}
         @include('admin/users/partials/form')
   </form>
		
@endsection
