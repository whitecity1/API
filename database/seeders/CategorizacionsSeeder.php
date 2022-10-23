<?php

namespace Database\Seeders;

use App\Models\Categorizacion;
use App\Models\Categorizazcion;
use App\Models\Servicio;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorizacionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorizacions=new Categorizacion();
        $categorizacions->nombre='Hotel';		
      
        $categorizacions->save();

        $categorizacions=new Categorizacion();
        $categorizacions->nombre='Restaurante';		
      
        $categorizacions->save();

        $categorizacions=new Categorizacion();
        $categorizacions->nombre='Centros Comerciales';		
      
        $categorizacions->save();
        

    }
}