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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto');
            $table->string('tipo_producto')->default('Cafe');
            $table->string('Proveedor');
            $table->string('imagen');
            $table->integer('cantidad_almacen')->default(0);
            $table->string('descripcion');
            $table->boolean('disponibilidad')->default(true);
            $table->string('codigo_barras');
            $table->decimal('precio',10,2);
            $table->date('fecha_caducidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
