<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evento=Evento::included()
        ->filter()
        ->sort()
        ->get();

        return $evento;
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
            'evento' => 'required|max:255',
            'municipio' => 'required|max:255',
            'direccion' => 'required|max:255',
            'horarios' => 'required|max:255',
            'fecha_inicio' => 'required|max:255',
            'fecha_fin' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'tipo_evento' => 'required|max:255',
            'imagen' => 'required|max:255',
            'user_id'=> 'required',
        ]);

        $evento=Evento::create($request->all());

        return $evento;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento,$id)
    {
        $evento = Evento::included()->findOrFail($id);
        
         return $evento;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            
            'evento' => 'required|max:255',
            'municipio' => 'required|max:255',
            'direccion' => 'required|max:255',
            'horarios' => 'required|max:255',
            'fecha_inicio' => 'required|max:255',
            'fecha_fin' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'tipo_evento' => 'required|max:255',
            'imagen' => 'required|max:255'.$evento->id,
            'user_id'=> 'required',
    
        ]);

        $evento->update($request->all());

        return $evento;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return $evento;
    }
}
