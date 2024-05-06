<?php

namespace App\Events;

use App\Models\PuntoVentaModel;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PuntoVentaSaving
{

    protected $puntoVenta;
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(PuntoVentaModel $puntoVenta)
    {
        $this->puntoVenta = $puntoVenta;
    }

    public function handle(){
        $producto = $this->puntoVenta->producto;
        $sumaTotal = $producto->precio * $this->puntoVenta->cantidad_requerida;

        $this->puntoVenta->total=$sumaTotal;
        $this->puntoVenta->save();


    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
