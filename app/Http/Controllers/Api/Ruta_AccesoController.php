<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rutas_Acceso;
use Illuminate\Http\Request;

class Ruta_AccesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accesoruta=Rutas_Acceso::included()
        ->filter()
        ->sort()
        ->get();

        return $accesoruta;
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
            'empresa_transporte' => 'required|max:255',
            'mun_ubicacion' => 'required|max:255',
            'inicio_atencion' => 'required|max:255',
            'cierre_atencion' => 'required|max:255',
            'direccion_empresa' => 'required|max:255',
            'contacto' => 'required|max:255',
            'correo_empresa' => 'required|max:255',
            'tipo_ruta' => 'required|max:255',
            'imagen' => 'required|max:255',
            
        ]);

        $accesoruta=Rutas_Acceso::create($request->all());

        return $accesoruta;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accesoruta  $accesoruta
     * @return \Illuminate\Http\Response
     */
    public function show(Rutas_Acceso $accesoruta,$id)
    {

        $accesoruta = Rutas_Acceso::included()->findOrFail($id);
        return $accesoruta;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accesoruta  $accesoruta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Rutas_Acceso $accesoruta)
    {
        $request->validate([
            'empresa_transporte' => 'required|max:255',
            'mun_ubicado' => 'required|max:255',
            'inicio_atencion' => 'required|max:255',
            'cierre_atencion' => 'required|max:255',
            'direccion_empresa' => 'required|max:255',
            'contacto' => 'required|max:255',
            'correo_empresa' => 'required|max:255',
            'tipo_ruta' => 'required|max:255',
            'imagen' => 'required|max:255|unique:categories,slug,'.$accesoruta->id,
        ]);

        $accesoruta->update($request->all());

        return $accesoruta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accesoruta  $accesoruta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rutas_Acceso $accesoruta)
    {
        $accesoruta->delete();
        return $accesoruta;
    }
}
