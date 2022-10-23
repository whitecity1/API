<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recomendado;
use Illuminate\Http\Request;

class RecomendadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recomendado=Recomendado::included()
        ->filter()
        ->sort()
        ->get();
        return $recomendado;
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
            'lugar_recomendado' => 'required|max:255',
            'resenahistorica' => 'required|max:255',
            'calificaciones' => 'required|max:255',
            'user_id' => 'required',
        ]);

        $recomendado=Recomendado::create($request->all());

        return $recomendado;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recomendado  $recomendado
     * @return \Illuminate\Http\Response
     */
    public function show(Recomendado $recomendado,$id)
    {

         
        $recomendado = Recomendado::included()->findOrFail($id);
        return $recomendado;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recomendado  $recomendado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recomendado $recomendado)
    {
        $request->validate([
            'lugar_recomendado' => 'required|max:255',
            'resenahistorica' => 'required|max:255',
            'calificaciones' => 'required|max:255',
            'imagen' => 'required|max:255'.$recomendado->id,
            'user_id' => 'required',
        ]);

        $recomendado->update($request->all());

        return $recomendado;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recomendado  $recomendado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recomendado $recomendado)
    {
        $recomendado->delete();
        return $recomendado;
    }
}
