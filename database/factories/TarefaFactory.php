<?php

namespace Database\Factories;

use App\Models\Tarefa;
use Illuminate\Database\Eloquent\Factories\Factory;

class TarefaFactory extends Factory
{
    protected $model = Tarefa::class;

    public function definition(): array
    {
        $tarefas = [
            'Estudar Laravel',
            'Revisar código do projeto',
            'Implementar autenticação',
            'Corrigir bugs do sistema',
            'Estudar banco de dados',
            'Refatorar services e repositories',
            'Criar novas features',
            'Melhorar interface do sistema',
            'Fazer deploy do projeto',
            'Documentar API',
            'Praticar lógica de programação',
            'Organizar estrutura do código',
        ];

        $descricoes = [
            'Focar em boas práticas e arquitetura limpa.',
            'Revisar código antigo e melhorar qualidade.',
            'Implementar melhorias no fluxo do sistema.',
            'Ajustar inconsistências e bugs encontrados.',
            'Aprofundar conhecimento em SQL e modelagem.',
            'Separar responsabilidades corretamente no código.',
            'Adicionar novas funcionalidades ao sistema.',
            'Melhorar a experiência do usuário na interface.',
            'Preparar aplicação para produção.',
            'Escrever documentação clara e objetiva.',
        ];

        return [
            'tarefa' => fake()->randomElement($tarefas),
            'descricao' => fake()->randomElement($descricoes),
            'prioridade' => fake()->randomElement(['baixa', 'media', 'alta']),
            'status' => fake()->boolean(35), 
        ];
    }
}
