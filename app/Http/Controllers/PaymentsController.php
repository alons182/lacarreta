<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Order;
use App\Order_Detail;
use Illuminate\Http\Request;

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
   		$prods = $request->input('prods');
   		$products = [];
         $totalDescuento = 0;
         $totalExento = 0;
         $totalGravado = 0;
         $totalFactura = 0;
         $totalImpuesto = 0;
         $totalLineas = 0;
         $montoFactura = 0;

   		$total = 0;
   		$envio = 0;

   		foreach ($prods as $product) {
   			$products [] = json_decode($product);
   		}
   		foreach ($products as $p) {
   			
            $gravadoLinea = 0;
            $impuestoLinea = 0;
            $exentoLinea = 0;
            $tasa_impuesto = 0;

            $facturaLinea = ($p->quantity * $p->precio_venta);
            $descuentoLinea = $facturaLinea * ($p->descuento / 100);
            if($p->paga_impuesto1 == 1){
               $gravadoLinea = $facturaLinea - $descuentoLinea;
               $impuestoLinea = $gravadoLinea * ($p->impuesto / 100);
            }else
               $exentoLinea = $facturaLinea - $descuentoLinea;
            
            $subtotalLinea = $gravadoLinea + $exentoLinea;
            $totalFacturaLinea = $subtotalLinea + $impuestoLinea;


            $montoFactura += $facturaLinea;
            $totalDescuento += $descuentoLinea;
            $totalExento += $exentoLinea;
            $totalGravado += $gravadoLinea;
            $totalFactura += $totalFacturaLinea;
            $totalImpuesto += $impuestoLinea;
            $totalLineas++;
            $tasa_impuesto = $p->impuesto;
   		}

   		$total = $totalFactura + $envio;

         $data = [
            'N_Factura' => '',
            'user_id' => auth()->user()->id,
            'Descrip_Cliente' => auth()->user()->name,
            'Tasa_Impuesto' => $tasa_impuesto,
            'Monto_Factura' => $montoFactura,
            'Total_Descuento' => $totalDescuento,
            'Total_Exento' => $totalExento,
            'Total_Gravado' => $totalGravado,
            'Total_Factura' => $totalFactura ,
            'Total_Impuesto' => $totalImpuesto,
            'Total_Lineas' => $totalLineas

         ];


         $order = Order::create($data);

         foreach ($products as $index => $p) {
            
            $gravadoLinea = 0;
            $impuestoLinea = 0;
            $exentoLinea = 0;

            $facturaLinea = ($p->quantity * $p->precio_venta);
            $descuentoLinea = $facturaLinea * ($p->descuento / 100);
            if($p->paga_impuesto1 == 1){
               $gravadoLinea = $facturaLinea - $descuentoLinea;
               $impuestoLinea = $gravadoLinea * ($p->impuesto / 100);
            }else
               $exentoLinea = $facturaLinea - $descuentoLinea;
            
            $subtotalLinea = $gravadoLinea + $exentoLinea;
            $totalFacturaLinea = $subtotalLinea + $impuestoLinea;
            
            $detail = new Order_Detail;
            $detail->Codigo_bodega = $p->codigo_ubicacion;
            $detail->Codigo_Articulo = $p->codigo;
            $detail->Descripcion = $p->descripcion;
            $detail->Cant_Facturada = $p->quantity;
            $detail->Precio_Venta = $p->precio_venta;
            $detail->Total_Impuesto = $impuestoLinea;
            $detail->Paga_Impuesto = $p->paga_impuesto1;
            $detail->Subtotal_Exento = $exentoLinea;
            $detail->Subtotal_Gravado = $gravadoLinea;
            $detail->SubTotal = $subtotalLinea;
            $detail->Numero_Linea = $index+1;
            $detail->Descuento = $p->descuento;
            $detail->Monto_Descuento = $descuentoLinea;
            $detail->Total_Venta = $subtotalLinea;
            $detail->Total = $totalFacturaLinea;
            
            $order->details()->save($detail);



            
         }

   		return view('payments.purchase')->with(compact('envio','order'));

   }

   public function purchaseResponse(Request $request)
   {
         $order_id = $request->input('order');
        
         $order = Order::with('details')->find($order_id);
         
   		return view('payments.purchase-response')->with(compact('order'));

   }
}
