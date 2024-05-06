<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table ="productos";

    protected $fillable = [
    "id",
    "nombre_producto",
    "tipo_producto",
    "Proveedor",
    "imagen",
    "cantidad_almacen",
    "descripcion",
    "disponibilidad",
    "codigo_barras",
    "precio",
    "fecha_caducidad"
    ];


    public function puntoDeVenta(){

        return $this->belongsTo(PuntoVentaModel::class);
    }



    public function TicketsVentaProductos() {

    return $this->hasMany(TicketVentaProducto::class);

    }

}
