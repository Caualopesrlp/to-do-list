<?php

namespace App\Repositories\Interfaces;

interface TarefaRepositoryInterface
{
    public function all(?string $search = null, string $id = 'tarefa');
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
    public function toggleStatus(int $id);
}