<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->integer('idBranch');
            $table->integer('id_cajero');

            $table->string('codigo_cliente');
            $table->integer('dpi');
            $table->string('nit');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion');
            $table->string('telefono');
            $table->date('nacimiento');

            $table->integer('cantidad_credito');
            $table->integer('interes_credito');
            $table->integer('numero_cuotas_credito');
            $table->integer('cuota_mensual_credito');

            $table->string('codigo_credito');
            $table->decimal('saldo',8,2);
            $table->integer('interes');
            $table->integer('id_host');
            $table->integer('id_cliente');


            $table->string('codigo_transaccion');
            $table->string('tipo_transaccion');
            $table->decimal('monto_transaccion',8,2);
            $table->string('descripcion_transaccion');
            $table->string('estado_transaccion');
            $table->integer('id_credito');
            $table->integer('id_tipo_moneda');

            $table->string('mensaje');



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
        Schema::drop('bitacora');
    }
}

