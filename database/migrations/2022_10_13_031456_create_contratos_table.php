<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_contrato');
            $table->string('nombre_cliente');
            $table->string('ruc_cliente');
            $table->string('direccion');
            $table->string('forma_pago');
            $table->string('condicion_pago');
            $table->date('fecha_emision');
            $table->date('fecha_entrega');
            $table->string('moneda');
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
        Schema::dropIfExists('contratos');
    }
};
