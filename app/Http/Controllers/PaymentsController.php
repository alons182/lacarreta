<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PaymentsController extends Controller
{
    

    public function checkout(Request $request)
   {

   		return view('payments.checkout');

   }

   public function payment(Request $request)
   {

   		return view('payments.payment');

   }

    public function purchase(Request $request)
   {
   		$data = $request->input('prods');
   		$products = [];
   		$subtotal = 0;
   		$total = 0;
   		$envio = 0;

   		foreach ($data as $product) {
   			$products [] = json_decode($product);
   		}
   		foreach ($products as $p) {
   			$subtotal += ($p->quantity * $p->precio);
   		}
   		$total = $subtotal + $envio;

   		return view('payments.purchase')->with(compact('products','envio','subtotal', 'total'));

   }

   public function purchaseResponse(Request $request)
   {
         $data = json_encode($request->all());
         $order = '1234567895421';
   		return view('payments.purchase-response')->with(compact('order','data'));

   }
}
