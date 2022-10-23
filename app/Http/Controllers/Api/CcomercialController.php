<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ccomercial;
use Illuminate\Http\Request;

class CcomercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    { $ccomercial=Ccomercial::included()
        ->filter()
        ->sort()
        ->get();
        
        return $ccomercial;
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
            'centrocomercial' => 'required|max:255',
            'imagen' => 'required|max:255',
            'telefono' => 'required|max:255',
            'correo' => 'required|max:255',
            'municipio' => 'required|max:255',
            'direccion' => 'required|max:255',
            'apertura' => 'required|max:255',
            'cierre' => 'required|max:255',
            
        ]);

        $ccomercial=Ccomercial::create($request->all());

        return $ccomercial;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ccomercial  $ccomercial
     * @return \Illuminate\Http\Response
     */
    public function show(Ccomercial $ccomercial,$id)
    {
        $ccomercial = Ccomercial::included()->findOrFail($id);
        return $ccomercial;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ccomercial  $ccomercial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ccomercial $ccomercial)
    {
        
        $request->validate([
            'centrocomercial' => 'required|max:255',
            'imagen' => 'required|max:255',
            'telefono' => 'required|max:255',
            'correo' => 'required|max:255',
            'municipio' => 'required|max:255',
            'direccion' => 'required|max:255',
            'apertura' => 'required|max:255',
            'cierre' => 'required|max:255'.$ccomercial->id,
            
        ]);

        $ccomercial->update($request->all());

        return $ccomercial;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ccomercial  $ccomercial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ccomercial $ccomercial)
    {
        $ccomercial->delete();
        return $ccomercial;
    }
}
