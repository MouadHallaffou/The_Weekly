<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word; // Génère un nom unique pour la catégorie
        return [
            'name' => $name, // Nom de la catégorie
            'slug' => Str::slug($name), // Génère un slug à partir du nom
        ];
    }
}
