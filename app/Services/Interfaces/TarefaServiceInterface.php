<?php

namespace App\Services\Interfaces;

interface TarefaServiceInterface
{
    public function listarTarefas(?string $search = null, string $sort = 'tarefa');
    public function criarTarefas(array $data);
    public function atualizarTarefas(int $id, array $data);
    public function deletarTarefas(int $id);
    public function buscarporId(int $id);
    public function toggleStatus(int $id);
    
}