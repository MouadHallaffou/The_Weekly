<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Appelle le seeder pour les catégories
        $this->call(CategorySeeder::class);
        // Appelle le seeder pour les comments
        $this->call([CommentSeeder::class,]);
        // Appelle le seeder pour les announecements
        $this->call(AnnouncementSeeder::class);
    }
    
}
