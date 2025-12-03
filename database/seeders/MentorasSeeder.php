<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;

class MentorasSeeder extends Seeder
{
    public function run(): void
    {
        // Cria 10 mentoras
        User::factory(10)->create([
            'role' => 'mentora', // Força o papel de mentora
            'bio' => 'Especialista em tecnologia com anos de mercado, pronta para ajudar outras mulheres.',
            'area_atuacao' => 'Desenvolvimento Web',
        ])->each(function ($user) {
            // Para cada mentora, cria um time obrigatório (padrão Jetstream)
            $team = Team::forceCreate([
                'user_id' => $user->id,
                'name' => explode(' ', $user->name, 2)[0] . "'s Team",
                'personal_team' => true,
            ]);
            $user->forceFill(['current_team_id' => $team->id])->save();
        });

        $this->command->info('10 Mentoras criadas com sucesso!');
    }
}
