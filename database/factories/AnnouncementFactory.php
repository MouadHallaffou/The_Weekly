<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence, // Génère un titre aléatoire
            'description' => $this->faker->paragraph, // Génère une description aléatoire
            'prix' => $this->faker->randomFloat(2, 10, 1000), // Génère un prix entre 10 et 1000
            'image' => $this->faker->imageUrl(), // Génère une URL d'image aléatoire
            'user_id' => \App\Models\User::factory(), // Associe un utilisateur aléatoire
            'categorie_id' => \App\Models\Category::factory(), // Associe une catégorie aléatoire
            'status' => $this->faker->randomElement(['en_attente', 'approuvé', 'rejeté']), // Statut aléatoire
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Date de création aléatoire
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Date de mise à jour aléatoire
        ];
    }
}