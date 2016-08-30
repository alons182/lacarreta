<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $table = "orders_details";
    
    protected $fillable = [
        	'order_id',
            'Codigo_Bodega',
            'Codigo_Articulo',
            'Descripcion',
            'Cant_Facturada',
            'Precio_Venta',
            'Total_Impuesto',
            'Paga_Impuesto',
            'Subtotal_Exento',
            'Subtotal_Gravado',
            'SubTotal',
            'Numero_Linea',
            'Monto_Descuento',
            'Total_Venta',
            'Total'
    ];



    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
