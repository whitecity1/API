<?php

namespace Database\Seeders;
use App\Models\Notificacion;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     
    public function run()
    {
        Notificacion::factory(5)->create();
        // $notificacion=new Notificacion();
        // $notificacion->nombre='Proximos eventos';
        // $notificacion->aspectos_clave='Proximamente';
        // $notificacion->save();

        // $notificacion=new Notificacion();
        // $notificacion->nombre='Rutas turisticas';
        // $notificacion->aspectos_clave='Proximamente';
        // $notificacion->save();
       
        // $notificacion=new Notificacion();
        // $notificacion->nombre='Lugares recomendados';
        // $notificacion->aspectos_clave='Proximante';
        // $notificacion->save();
       
       
    
    }
}
