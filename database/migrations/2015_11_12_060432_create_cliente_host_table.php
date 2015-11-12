<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteHostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clienteHost', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_host');
            $table->integer('id_cliente');
            $table->decimal('saldo',8,2);
            $table->integer('interes');
            $table->integer('id_credito');
            $table->integer('id_transaccion');
            $table->string('tipo_transaccion');
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
        Schema::drop('clienteHost');
    }
}
