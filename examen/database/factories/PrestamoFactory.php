<?php

namespace Database\Factories;
use app\Models\Prestamo;
use app\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PrestamoFactory extends Factory
{
    protected $model = Prestamo::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'fecha_prestamo' => $this->faker->date(),
            'fecha_devolucion' => $this->faker->date(),
            'libro_id' => \App\Models\Libro::factory(),
        ];
    }
}
