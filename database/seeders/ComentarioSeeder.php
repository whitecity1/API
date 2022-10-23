<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     protected $model = Comentario::class;

    public function run()
    {
        Comentario::factory(5)->create();
    }
}
