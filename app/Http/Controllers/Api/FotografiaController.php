<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fotografia;
use Illuminate\Http\Request;

class FotografiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotografia=Fotografia::included()
        ->filter()
        ->sort()
        ->get();

        return $fotografia;
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

            'imagen' => 'required|max:255',
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255',
        ]);

        $fotografia=Fotografia::create($request->all());

        return $fotografia;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fotografia  $fotografia
     * @return \Illuminate\Http\Response
     */
    public function show(Fotografia $fotografia,$id)
    {
        
        $fotografia = Fotografia::included()->findOrFail($id);
        return $fotografia;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fotografia  $fotografia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fotografia $fotografia)
    {
        $request->validate([
            'imagen' => 'required|max:255',
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255'.$fotografia->id,
    
        ]);

        $fotografia->update($request->all());

        return $fotografia;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fotografia  $fotografia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fotografia $fotografia)
    {
        $fotografia->delete();
        return $fotografia;
    }
}
