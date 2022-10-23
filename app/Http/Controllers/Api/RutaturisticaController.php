<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rutas_Turistica;
use Illuminate\Http\Request;

class RutaturisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutaturistica=Rutas_Turistica::included()
        ->filter()
        ->sort()
        ->get();
        
        return $rutaturistica;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'ruta_turistica' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'municipio_ubicada' => 'required|max:255',
            'direccion_ruta' => 'required|max:255',
            'contactos' => 'required|max:255',
            'h_apertura' => 'required|max:255',
            'h_cierre' => 'required|max:255',
            'tipo_rutaTur' => 'required|max:255',
            'imagen' => 'required|max:255',
            
        ]);

        $rutaturistica=Rutas_Turistica::create($request->all());

        return $rutaturistica;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rutaturistica  $rutaturistica
     * @return \Illuminate\Http\Response
     */
    public function show(Rutas_Turistica $rutaturistica,$id)
    {

        // $category = Category::with(['posts'])->findOrFail($id);
        $rutaturistica = Rutas_Turistica::included()->findOrFail($id);
       //$category = Category::included(); para probar los returns
        return $rutaturistica;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rutaturistica  $rutaturistica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rutas_Turistica $rutaturistica)
    {
        $request->validate([
            'ruta_turistica' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'municipio_ubicada' => 'required|max:255',
            'direccion_ruta' => 'required|max:255',
            'contactos' => 'required|max:255',
            'h_apertura' => 'required|max:255',
            'h_cierre' => 'required|max:255',
            'tipo_rutaTur' => 'required|max:255',
            'imagen' => 'required|max:255'.$rutaturistica->id,
            
        ]);

        $rutaturistica->update($request->all());

        return $rutaturistica;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rutaturistica  $rutaturistica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rutas_Turistica $rutaturistica)
    {
        $rutaturistica->delete();
        return $rutaturistica;
    }
}
