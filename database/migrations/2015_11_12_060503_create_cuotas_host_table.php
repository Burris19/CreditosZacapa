<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuotasHostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuotasHost', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_clienteHost')->unsigned();
            $table->foreign('id_clienteHost')->references('id')->on('clienteHost');

            $table->decimal('montoCuota');
            $table->date('fechaPago');
            $table->string('estado');
            $table->decimal('balance');
            $table->integer('id_host');


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
        Schema::drop('cuotasHost');
    }
}
