<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function editarVista($id)
    {
        // Obtener el producto con el ID proporcionado
        $producto = Productos::findOrFail($id);

        // Renderizar la vista de edición utilizando Inertia
        return Inertia::render('EditarProductos', [
            'producto' => $producto,
        ]);
    }

     public function agregarVista(){

        return Inertia::render("AgregarProductos" );
     }

     public function apiIndex()
     {
         $productos = \App\Models\Productos::all()->map(function ($producto) {
             return [
                 'id' => $producto->id,
                 'Nombre' => $producto->nombre_producto,
                 'Tipo' => $producto->tipo_producto,
                 'Proveedor' => $producto->Proveedor,
                 'Stock' => $producto->cantidad_almacen,
                 'Descripcion' => $producto->descripcion,
                 'Disponibilidad' => $producto->disponibilidad,
                 'Codigo' => $producto->codigo_barras,
                 'Precio' => $producto->precio,
                 'Caducidad' => $producto->fecha_caducidad,
             ];
         });
     
         return response()->json([
             "productos" => $productos,
             'message' => 'Éxito al enviar la petición',
         ], 200);
     }

    public function index()
    {

        return Inertia::render("Productos");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [

            'nombre_producto' => 'required|string|max:255',
            'tipo_producto'=> 'required|string|max:255',
            'Proveedor'=> 'required|string|max:255',
            'imagen'=>'string|max:500',
            'cantidad_almacen'=> 'required|integer',
            'descripcion'=> 'required|string|max:500',
          'disponibilidad'=> 'required|boolean',
           'codigo_barras'=> 'required|string',
            'precio' => 'required',
            'fecha_caducidad'=>'required|date'
        ];


        try {
            $request->validate($rules);

            $productoNuevo = new Productos();

            $productoNuevo->nombre_producto = $request->input('nombre_producto');
            $productoNuevo->tipo_producto = $request->input('tipo_producto');
            $productoNuevo->Proveedor = $request ->input('Proveedor');
            $productoNuevo->imagen = $request ->input('imagen');
            $productoNuevo->cantidad_almacen = $request ->input('cantidad_almacen');
            $productoNuevo->descripcion = $request ->input('descripcion');
            $productoNuevo->disponibilidad = $request->input('disponibilidad');
            $productoNuevo->codigo_barras = $request ->input('codigo_barras');
            $productoNuevo->precio = $request -> input('precio');
            $productoNuevo->fecha_caducidad = $request -> input('fecha_caducidad');
            $productoNuevo->save();


            return response()->json([
                 'message'=> 'Producto agregado exisotamente ',
                 'productoNuevo' => $productoNuevo

                ],200);

        } catch (\Throwable $th) {

            return response()->json([
                'error'=> $th->getMessage()


            ],400);

        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request , $id) 
    {
   
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request , $id)
    {
        $ProductoMostrar = Productos::findOrFail($id);

        if(! $ProductoMostrar) {
            return response()->json(['No existe ese producto'] ,400);

    }

   return response()->json([

    'ProductoMostrar'=> $ProductoMostrar

   ] ,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $productoEditar = Productos::find($id)  ;


        if(!$productoEditar){
            return response()->json([
                'error'=> 'No existe el producto']) ;

        }

        $request->validate([
          //  'nombre_producto' => 'string|max:255',
          //  'tipo_producto' => 'string|max:255',
        //    'Proveedor' => 'string|max:255',
           // 'imagen' => 'string',
          //  'cantidad_almacen' => 'numeric', // Cambiado a una regla de validación adecuada
          //  'descripcion' => 'string|max:255', // Se cambió la longitud máxima a 255
          //  'disponibilidad' => 'boolean', // Cambiado a una regla booleana
        //    'codigo_barras' => 'string', // Cambiado a una regla booleana
         //   'precio' => 'required',
           // 'fecha_caducidad' => 'date',
        ]);



            try {


                $productoEditar->update($request->all());

                return response()->json([
                    'message'=> 'Actualizado exitosamente',
                    'ProductoEditado'=> $productoEditar
                ]);



            } catch (\Throwable $th) {
                return response()->json([
                    'error'=> $th->getMessage()
                ] ,400);
            }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $productoEliminar = Productos::find($id) ;

        if(!$productoEliminar){


            return response()->json([
                'error'=> 'No existe ese producto'

            ] ,400);


    }
       try {
        $productoEliminar->delete();


        return response()->json(['Producto eliminado correctamente',
            'Producto eliminado'=> $productoEliminar
        ] ,200);
       } catch (\Throwable $th) {
        return response()->json([
            'error'=> $th->getMessage()


        ] ,400);
       }
}

}
