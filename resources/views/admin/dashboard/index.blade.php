@extends('admin.layouts.admin')

@section('content')

	<div class="row mg-b">
        <div class="col-xs-6">
            <h3 class="no-margin">Dashboard</h3>
            <small>Welcome back, {{ auth()->user()->name }}</small>
        </div>
        <div class="col-xs-6 text-right">
            <a href="#" class="fa fa-flash pull-right pd-sm toggle-chat toggle-sidebar" data-toggle="off-canvas" data-move="rtl">
                <span class="badge bg-danger animated flash">6</span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <section class="panel">
                <div class="panel-body">
                    <div class="circle-icon bg-success">
                        <i class="fa fa-users"></i>
                    </div>
                    <div>

                         <a href="/admin/users" style="display: block;">
                             <h3 class="no-margin">{{ $tu }}</h3>
                             Usuarios
                         </a>
                    </div>
                </div>
            </section>
        </div>
         <div class="col-md-3 col-sm-6 col-xs-12">
            <section class="panel">
                <div class="panel-body">
                    <div class="circle-icon bg-danger">
                        <i class="fa fa-coffee"></i>
                    </div>
                    <div>

                        <a href="/admin/orders" style="display: block;">
                            <h3 class="no-margin">{{ $to }}</h3>
                            Ordenes
                        </a>
                    </div>
                </div>
            </section>
        </div>
        
    </div>

		
@endsection

