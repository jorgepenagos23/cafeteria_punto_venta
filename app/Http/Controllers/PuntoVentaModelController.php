<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\PuntoVentaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PuntoVentaModelController extends Controller
{

    public function consultauno() {
        $ProductoMasVendido = PuntoVentaModel::select(
                "productos.nombre_producto as nombre_producto",
                "productos.id as id_Producto",
                DB::raw('SUM(punto_venta_models.total) as TotalPagado'),
                DB::raw('SUM(punto_venta_models.cantidad_requerida) as CantidadComprada')
            )
            ->join("productos", "productos.id", "=", "punto_venta_models.idProducto")
            ->groupBy('productos.id', 'productos.nombre_producto')
            ->orderByDesc('TotalPagado')
            ->get();

        return response()->json([
            'ProductoMasVendido' => $ProductoMasVendido
        ]);
    }


    public function consultaunodos() {
        $ProductoMasVendido = PuntoVentaModel::select(
                "productos.nombre_producto as nombre_producto",
                "productos.id as id_Producto",
                DB::raw('SUM(punto_venta_models.total) as TotalPagado'),
                DB::raw('SUM(punto_venta_models.cantidad_requerida) as CantidadComprada')
            )
            ->join("productos", "productos.id", "=", "punto_venta_models.idProducto")
            ->groupBy('productos.id', 'productos.nombre_producto')
            ->orderByDesc('TotalPagado')
            ->take(3)
            ->get();

        return response()->json([
            'ProductoMasVendido' => $ProductoMasVendido
        ]);
    }

    public function consultadosPorFecha(Request $request) {

        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        $ProductoMasVendido = PuntoVentaModel::select(
                "productos.nombre_producto as nombre_producto",
                "productos.id as id_Producto",
                DB::raw('SUM(punto_venta_models.total) as TotalPagado'),
                DB::raw('SUM(punto_venta_models.cantidad_requerida) as CantidadComprada')
            )
            ->join("productos", "productos.id", "=", "punto_venta_models.idProducto")
            ->whereBetween('punto_venta_models.fecha', [$fechaInicio, $fechaFin]) // Filtrar por rango de fechas
            ->groupBy('productos.id', 'productos.nombre_producto')
            ->orderByDesc('TotalPagado')
            ->get();

        return response()->json([
            'ProductoMasVendidoRango' => $ProductoMasVendido
        ]);
    }





    public function ventas()
    {

        $VentasConProductoTotal = PuntoVentaModel::select(

        "productos.nombre_producto as nombre_producto",
        "productos.id as id_Producto",
        "punto_venta_models.fecha as fecha",
        'punto_venta_models.id as Id_Venta',

        'punto_venta_models.detalles as DetallesVenta',
        'punto_venta_models.total as Total Pagado',
        'punto_venta_models.metodo_pago as Metodo de Pago',
        'punto_venta_models.cantidad_requerida as Cantida Comprada',
        'punto_venta_models.nombre_cajero as Nombre del Cajero',

            )->join("productos","productos.id","=","punto_venta_models.idProducto")->get();


            return response()->json([

                'VentasconProducto'=> $VentasConProductoTotal

            ]);

        }





    public function vista(){

        return Inertia::render("ModuloPuntoVenta");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $rules= [

           'nombre_cajero'=> 'required|string|max:255',
            'fecha'=> 'required|date',
          'detalles'=> 'required|string|max:255',
           'cantidad_requerida'=> 'required|integer',
          'metodo_pago'=> 'required|string|max:255',
            'idProducto'=> 'required|integer',


        ];

        try {
            $request->validate($rules);

            $ventaNueva = new PuntoVentaModel();

            $ventaNueva->nombre_cajero = $request->input('nombre_cajero');
            $ventaNueva->fecha = $request->input('fecha');
            $ventaNueva->detalles = $request->input('detalles');
            $ventaNueva->cantidad_requerida =$request->input('cantidad_requerida');
            $ventaNueva->metodo_pago = $request->input('metodo_pago');
            $ventaNueva->idProducto= $request->input('idProducto');
            $ventaNueva->save();
            return response()->json([

                'message'=> 'Venta Registrada Exitosamente',
                'ventaNueva' => $ventaNueva,
            ]);


        } catch (\Throwable $th) {

            return response()->json([ 'error' => $th->getMessage() ],400);
        }




    }

    /**
     * Display the specified resource.
     */
    public function show(PuntoVentaModel $puntoVentaModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PuntoVentaModel $puntoVentaModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PuntoVentaModel $puntoVentaModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PuntoVentaModel $puntoVentaModel)
    {
        //
    }
}
