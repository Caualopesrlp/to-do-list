<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tarefa;

class TarefaSeeder extends Seeder
{
    public function run(): void
    {
        Tarefa::factory()
            ->count(20)
            ->create();
    }
}