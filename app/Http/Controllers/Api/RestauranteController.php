<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurante;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurante=Restaurante::included()
        ->filter()
        ->sort()
        ->get();
        
        return $restaurante;
  
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
            'restaurante' => 'required|max:255',
            'imagen' => 'required|max:255',
            'telefono' => 'required|max:255',
            'correo' => 'required|max:255',
            'mun_ubicado' => 'required|max:255',
            'direccion' => 'required|max:255',
            'apertura' => 'required|max:255',
            'cierre' => 'required|max:255',
            
        ]);

        $restaurante=Restaurante::create($request->all());

        return $restaurante;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurante $restaurante,$id)
    {

         
        $restaurante = Restaurante::included()->findOrFail($id);
        return $restaurante;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurante $restaurante)
    {
        $request->validate([
            'restaurante' => 'required|max:255',
            'imagen' => 'required|max:255',
            'telefono' => 'required|max:255',
            'correo' => 'required|max:255',
            'mun_ubicado' => 'required|max:255',
            'direccion' => 'required|max:255',
            'apertura' => 'required|max:255',
            'cierre' => 'required|max:255'.$restaurante->id,
            
        ]);

        $restaurante->update($request->all());

        return $restaurante;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurante $restaurante)
    {
        $restaurante->delete();
        return $restaurante;
    }
}
