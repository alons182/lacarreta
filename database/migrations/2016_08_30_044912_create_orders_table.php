<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('N_Factura')->nullable();
            $table->string('Descrip_Cliente')->nullable();
            $table->double('Tasa_Impuesto', 15, 2)->default(0);
            $table->double('Monto_Factura', 15, 2)->default(0);
            $table->double('Total_Descuento', 15, 2)->default(0);
            $table->double('Total_Exento', 15, 2)->default(0);
            $table->double('Total_Gravado', 15, 2)->default(0);
            $table->double('Total_Impuesto', 15, 2)->default(0);
            $table->double('Total_Factura', 15, 2)->default(0);
            $table->integer('Total_Lineas')->unsigned();
            $table->timestamps();

                  

        });
        Schema::create('orders_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->index();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('Codigo_Bodega');
            $table->string('Codigo_Articulo');
            $table->string('Descripcion');
            $table->double('Cant_Facturada', 15, 2)->default(0);
            $table->double('Precio_Venta', 15, 2)->default(0);
            $table->double('Descuento', 15, 2)->default(0);
            $table->double('Monto_Descuento', 15, 2)->default(0);
            $table->double('Subtotal_Exento', 15, 2)->default(0);
            $table->double('Subtotal_Gravado', 15, 2)->default(0);
            $table->double('SubTotal', 15, 2)->default(0);
            $table->double('Total_Venta', 15, 2)->default(0);
            $table->double('Total_Impuesto', 15, 2)->default(0);
            $table->double('Total', 15, 2)->default(0);
            $table->char('Paga_Impuesto', 1);
            $table->double('Numero_Linea', 15, 2)->default(0);
           
            $table->timestamps();

                  

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders_details');
        Schema::drop('orders');
    }
}
