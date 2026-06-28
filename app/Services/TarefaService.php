<?php

namespace App\Services;

use App\Models\Tarefa;
use App\Repositories\Interfaces\TarefaRepositoryInterface;
use App\Services\Interfaces\TarefaServiceInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TarefaService implements TarefaServiceInterface
{
    public function __construct(
        protected TarefaRepositoryInterface $repository
    ) {}

    public function listarTarefas(
        ?string $search = null,
        string $sort = 'tarefa'
    ): LengthAwarePaginator {
        return $this->repository->all($search, $sort);
    }

    public function criarTarefas(array $data): Tarefa
    {
        return $this->repository->create($data);
    }

    public function atualizarTarefas(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deletarTarefas(int $id)
    {
        return $this->repository->delete($id);
    }

    public function buscarPorId(int $id): Tarefa
    {
        return $this->repository->find($id);
    }

    public function toggleStatus(int $id)
    {
        return $this->repository->toggleStatus($id);
    }
}
