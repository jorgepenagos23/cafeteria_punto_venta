<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PuntoVentaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for($i = 0 ; $i < 10;++$i){

            $detalles='Compra';
            $metodos = ['SPEI','Efectivo','Debito','Credito'];
            DB::table("punto_venta_models")->insert([
                "nombre_cajero"=>$faker->name,
                "fecha"=> $faker->datetime,
                "detalles"=> $detalles,
                "cantidad_requerida"=>100,
                "total"=>$faker->numberBetween(100,550.60),
                "metodo_pago"=>$faker->randomElement($metodos),
                "idProducto"=>$faker->randomNumber(1,300),
            ]);}
    }
}
