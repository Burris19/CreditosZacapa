<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientoLeerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientoLeer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idBranch');
            $table->integer('idCliente');
            $table->integer('idCredito');
            $table->decimal('saldo',8,2);
            $table->integer('idCuota');
            $table->integer('idTransaccion');
            $table->boolean('estado')->default(false);

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
        Schema::drop('movimientoLeer');
    }
}
