<?php

namespace Database\Factories;
use app\Models\Autor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AutorFactory extends Factory
{
    protected $model = Autor::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'nacionalidad' => $this->faker->country(),
        ];
    }
}
