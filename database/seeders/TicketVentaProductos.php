<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketVentaProductos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
        \App\Models\TicketVentaProducto::create([
            "sumaTotal"=>500,
            "fecha"=> $faker->date,
            "idVenta"=> $faker->numberBetween(1,5),

        ]  ); }
}
}
