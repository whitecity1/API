<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autoridad;
use Illuminate\Http\Request;

class AutoridadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autoridad=Autoridad::included()
        ->filter()
        ->sort()
        ->get();
        return $autoridad;
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
            
            'nombre_entidad' => 'required|max:255',
            'imagen' => 'required|max:255',
            'telefono' => 'required|max:255',
            'correo' => 'required|max:255',
            'mun_ubicado' => 'required|max:255',
            'direccion' => 'required|max:255',
            'apertura' => 'required|max:255',
            'cierre' => 'required|max:255',
            
        ]);

        $autoridad=Autoridad::create($request->all());

        return $autoridad;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autoridad  $autoridad
     * @return \Illuminate\Http\Response
     */
    public function show(Autoridad $autoridad,$id)
    {   
         $autoridad = Autoridad::included()->findOrFail($id);
         return $autoridad;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autoridad  $autoridad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autoridad $autoridad)
    {
        $request->validate([
            
            'nombre_entidad' => 'required|max:255',
            'imagen' => 'required|max:255',
            'telefono' => 'required|max:255',
            'correo' => 'required|max:255',
            'mun_ubicado' => 'required|max:255',
            'direccion' => 'required|max:255',
            'apertura' => 'required|max:255',
            'cierre' => 'required|max:255',
            
        ]);

        $autoridad->update($request->all());

        return $autoridad;
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autoridad  $autoridad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autoridad $autoridad)
    {
        $autoridad->delete();
        return $autoridad;
    }
}
