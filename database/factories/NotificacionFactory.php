<?php

namespace Database\Factories;

use App\Models\Notificacion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NotificacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Notificacion::class;

    public function definition()
    {
        return [
            'nombre'=> $this->faker->name(),
            'aspectos_clave'=> $this->faker->sentence(), 
        ];
    }
}
