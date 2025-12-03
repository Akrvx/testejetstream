<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Aqui nós "chamamos" os outros arquivos que criamos.
        // A ordem importa! Primeiro o Admin, depois as Mentoras.
        
        $this->call([
            AdminSeeder::class,
            MentorasSeeder::class,
        ]);
    }
}