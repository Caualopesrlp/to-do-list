<?php

namespace App\Repositories;

use App\Models\Tarefa;
use App\Repositories\Interfaces\TarefaRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TarefaRepository implements TarefaRepositoryInterface
{
    public function all(?string $search = null, string $sort = 'tarefa',): LengthAwarePaginator
    {
        return Tarefa::when($search, function ($query, $search) {
            $query->where('tarefa', 'like', "%{$search}%");
        })
            ->orderBy($sort)
            ->paginate(10);
    }

    public function create(array $data)
    {
        return Tarefa::create($data);
    }

    public function update(int $id, array $data): Tarefa
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->update($data);

        return $tarefa;
    }

    public function delete(int $id): int
    {
        return Tarefa::destroy($id);
    }

    public function find(int $id): Tarefa
    {
        return Tarefa::findOrFail($id);
    }

    public function toggleStatus(int $id)
    {
        $tarefa = Tarefa::findOrFail($id);

        $tarefa->status = !$tarefa->status;

        $tarefa->save();

        return $tarefa;
    }
}
