<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;

    protected $fillable = [
        	'N_Factura',
            'user_id',
            'Descrip_Cliente',
            'Tasa_Impuesto',
            'Monto_Factura',
            'Total_Descuento' ,
            'Total_Exento',
            'Total_Gravado' ,
            'Total_Factura' ,
            'Total_Impuesto' ,
            'Total_Lineas'
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function details()
    {
        return $this->hasMany(Order_Detail::class);
    }
}
