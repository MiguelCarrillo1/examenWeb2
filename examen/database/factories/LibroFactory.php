<?php
namespace Database\Factories;
use app\Models\Autor;
use App\model\Libro;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LibroFactory extends Factory
{
    protected $model = libro::class;
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(),
            'anio_publicacion' => $this->faker->year(),
            'genero' => $this->faker->word(),
            'autor_id' => \App\Models\Autor::factory(),
        ];
    }
}
