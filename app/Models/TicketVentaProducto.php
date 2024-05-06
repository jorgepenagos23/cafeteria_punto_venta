<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketVentaProducto extends Model
{
    use HasFactory;

    protected $table = 'ticket_venta_productos';

    protected $fillable = [
        'id',
        'sumaTotal',
        'fecha',
        'idVenta',


    ];

    public function producto(){

        return $this->belongsTo(Productos::class);
    }



    public function puntoDeVenta(){

        return $this->belongsTo(PuntoVentaModel::class);
}
}
