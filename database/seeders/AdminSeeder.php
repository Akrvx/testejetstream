<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Cria o Usuário Admin
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@projeto.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'bio' => 'Administradora Geral',
            'area_atuacao' => 'Gestão',
            'email_verified_at' => now(), // Importante para não pedir verificação
        ]);

        // 2. Cria o Time Pessoal (Obrigatório)
        $team = Team::forceCreate([
            'user_id' => $user->id,
            'name' => 'Time Administrativo',
            'personal_team' => true,
        ]);

        // 3. VINCULA O TIME AO USUÁRIO (A parte que estava falhando)
        $user->current_team_id = $team->id;
        $user->save();
        
        $this->command->info('Admin criado e vinculado ao Time ID: ' . $team->id);
    }
}