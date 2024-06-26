<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

        $this->call(ProductosTableSeeder::class);



        \App\Models\User::factory()->create([
             'name' => 'Jorge Ramirez Penagos',
             'email' => 'jorgepenagos50@gmail.com',
     ]);

         $this->call(PuntoVentaTableSeeder::class);

         $this->call(TicketVentaProductos::class);


    }
}
