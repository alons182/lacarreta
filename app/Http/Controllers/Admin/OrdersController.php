<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    
    public function index(Request $request)
    {
    	$data = $request->all();
        $search = (isset($data['q'])) ? $data['q'] : '';

        if($search !='')
        {
        	$orders =  Order::where(function($query)use($search){
        		$query->where('N_Factura','like','%'.$search.'%')
        			  ->orWhere('Descrip_Cliente','like','%'.$search.'%');
        	})->paginate(10);
        }else{
        	$orders = Order::orderBy('created_at','DESC')->paginate(10);
        }

        
		   

        return view('admin.orders.index')->with(compact('orders','search'));
    }

    public function show($id)
    {
        $order =  Order::find($id);
        $envio = 0;

        return view('admin.orders.show')->with(compact('order','envio'));

    }

     public function destroy($id)
    {
        $order =  Order::find($id);

        if(!$order)
        { 
            flash('Orden No Encontrada.. No se pudo eliminar','danger');
            return Redirect()->route('admin.orders.index');
        }
        
        foreach ($order as $detail) {
            $detail->delete();
        }

        $order->delete();

        flash('Orden Eliminada','success');

        return Redirect()->route('admin.orders.index');
    }
}
