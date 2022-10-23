<?php

namespace App\Http\Controllers;
use App\Models\Tipo_Servicio;

use Illuminate\Http\Request;

class TiposervicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposervs = Tipo_Servicio::all();
        return view('tiposervicios.index')->with('tiposervs', $tiposervs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposervicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tiposervs = new Tipo_Servicio();
        $tiposervs->id = $request->get('id');
        $tiposervs->tipo_servicio = $request->get('tipo_servicio');

        $tiposervs->save();

        return redirect('/tiposervicios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposerv = Tipo_Servicio::find($id);
        return view('tiposervicios.edit')->with('tiposerv', $tiposerv);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tiposerv = Tipo_Servicio::find( $id);
        $tiposerv->tipo_servicio = $request->get('tipo_servicio');
 
        $tiposerv->save();
 
         return redirect('/tiposervicios');
     }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiposerv = Tipo_Servicio::find( $id);
        $tiposerv->delete();
        return redirect('/tiposervicios');
    }
}
