<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTarefaRequest;
use App\Services\Interfaces\TarefaServiceInterface;

class TarefaController extends Controller
{
    public function __construct(
        protected TarefaServiceInterface $service
    ) {}

    public function index()
    {
        $search = request('search');
        $sort = request('filter', 'tarefa');

        $tarefas = $this->service->listarTarefas($search, $sort);

        return view('tarefas.index', compact('tarefas', 'sort'));
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(StoreTarefaRequest $request)
    {
        $this->service->criarTarefas($request->validated());

        return redirect()
            ->route('tarefas.index')
            ->with('success', 'Tarefa criada com sucesso!');
    }

    public function show(int $id)
    {
        //
    }

    public function edit(string $id)
    {
        $tarefa = $this->service->buscarPorId($id);

        return view('tarefas.edit', compact('tarefa'));
    }

    public function update(StoreTarefaRequest $request, string $id)
    {
        $this->service->atualizarTarefas($id, $request->validated());

        return redirect()
            ->route('tarefas.index')
            ->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $this->service->deletarTarefas($id);

        return redirect()
            ->route('tarefas.index')
            ->with('success', 'Tarefa exlcuída com sucesso!');
    }

    public function toggle(int $id)
    {
        $this->service->toggleStatus($id);

        return redirect()
            ->route('tarefas.index')
            ->with('success', 'Status atualizado com sucesso!');
    }
}
