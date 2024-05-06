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
        Schema::create('ticket_venta_productos', function (Blueprint $table) {
            $table->id();
            $table->decimal('sumaTotal',10,2);
            $table->date('fecha');
            $table->unsignedBigInteger('idVenta');
            $table->foreign('idVenta')->references('id')->on('punto_venta_models')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_venta_productos');
    }
};
