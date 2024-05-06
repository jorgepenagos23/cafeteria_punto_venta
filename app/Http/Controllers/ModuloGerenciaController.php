<?php

namespace App\Http\Controllers;

use App\Models\ModuloGerencia;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ModuloGerenciaController extends Controller
{



    public function vista(){

        return Inertia::render("ModuloGerencia");
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
        //consulta 1 
        
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ModuloGerencia $moduloGerencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModuloGerencia $moduloGerencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModuloGerencia $moduloGerencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModuloGerencia $moduloGerencia)
    {
        //
    }
}
