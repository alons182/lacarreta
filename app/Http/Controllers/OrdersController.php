<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    
    public function update($id, Request $request)
    {
    	$data = $request->all();
        $order = Order::find($id);

        $order->fill($data);
        $order->save();



        return "Orden Actualizada Correctamente";
    }
}
