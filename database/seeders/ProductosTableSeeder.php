<?php

namespace Database\Seeders;

use App\Models\Productos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $faker = \Faker\Factory::create();

            for ($i = 0; $i < 10; $i++) {
            $Nombres =['Cafe','Sandwich','Frappe','Pizza','Chocolate','Pastel de Chocolate','Pay'];
            $Productos=['Bebida','Comida','Pasteleria'];

           $cantidad=100;
            DB::table("productos")->insert([

                "nombre_producto"=> $faker->randomElement($Nombres),
                "tipo_producto"=> $faker->randomElement($Productos),
                "proveedor"=> $faker->randomElement(["LALA","ALPURA","NESTLE"]),
                "imagen" =>$faker->name,
                "cantidad_almacen"=>$cantidad,
                "descripcion"=>$faker->name,
                "disponibilidad"=>true,
                "codigo_barras"=>$faker->name,
                "fecha_caducidad"=>$faker->date,
                "precio"=> $faker->randomFloat(4,150,50),
]);

}






}
}
