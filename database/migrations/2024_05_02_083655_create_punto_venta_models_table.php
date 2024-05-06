<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('punto_venta_models', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cajero')->default('Jorge Ramirez Penagos');
            $table->datetime('fecha')->default(now());
            $table->string('detalles');
            $table->integer('cantidad_requerida')->default(0);
            $table->double('total')->default(0);
            $table->string('metodo_pago');

            $table->unsignedBigInteger('idProducto');
            $table->foreign('idProducto')->references('id')->on('productos')->onDelete('Cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('punto_venta_models');
    }
};
