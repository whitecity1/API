<?php

namespace Database\Factories;

use App\Models\Comentario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Comentario::class;

    public function definition()
    {
        return [
            'comentario'=>$this->faker->sentence(),	
            'hora'=>$this->faker->time(),
            'fecha'=>$this->faker->date(),
            'calificaciones'=>$this->faker->sentence()
        ];
    }
}
