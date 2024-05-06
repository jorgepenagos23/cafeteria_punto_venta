<?php

namespace App\Models;

use Database\Seeders\TicketVentaProductos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class PuntoVentaModel extends Model
{
    use HasFactory;

    protected $table = "punto_venta_models";

    protected $fillable = [
        "id",
        "nombre_cajero",
        "fecha",
        "detalles",
        "cantidad_requerida",
        "total",
        "metodo_pago",
        "idProducto",



    ] ;

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($venta) {
            $producto = Productos::find($venta->idProducto);
            if ($producto) {
                $venta->total = $producto->precio * $venta->cantidad_requerida;
            }
        });
    }
        public function productos(){

            return $this->belongsTo(Productos::class, 'idProducto');
        }


        public function TicketsVentaProductos(){


            return $this->hasMany(TicketVentaProductos::class);
        }




}
