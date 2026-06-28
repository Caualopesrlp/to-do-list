@extends('layouts.app')

@section('title', 'Minhas Tarefas')

@section('content')

<h2>Minhas tarefas</h2>

{{-- SEARCH --}}
<form action="{{ route('tarefas.index') }}" method="GET" class="search">

    <input
        type="text"
        name="search"
        placeholder="Pesquisar tarefa..."
        value="{{ request('search') }}"
    >

    <button type="submit" class="btn btn-primary">
        Buscar
    </button>

</form>

{{-- SORT (SEPARADO, discreto) --}}
<form action="{{ route('tarefas.index') }}" method="GET" class="search">

    <select name="filter" class="filter-select" onchange="this.form.submit()">

        <option value="">Todos</option>

        <option value="prioridade" {{ request('filter') == 'prioridade' ? 'selected' : '' }}>
            Por prioridade
        </option>

        <option value="status" {{ request('filter') == 'status' ? 'selected' : '' }}>
            Por status
        </option>

    </select>

</form>

{{-- LISTA --}}
<div class="tasks">

    @forelse($tarefas as $tarefa)

        <div class="task">

            <div class="task-header">

                <div class="task-title">

                    @if($tarefa->status)
                        ✅
                    @else
                        ⏳
                    @endif

                    {{ $tarefa->tarefa }}

                </div>

                <span class="badge {{ $tarefa->prioridade }}">
                    {{ ucfirst($tarefa->prioridade) }}
                </span>

            </div>

            @if($tarefa->descricao)
                <div class="task-description">
                    {{ $tarefa->descricao }}
                </div>
            @endif

            <div class="task-footer">

                <span class="badge {{ $tarefa->status ? 'concluida' : 'pendente' }}">
                    {{ $tarefa->status ? 'Concluída' : 'Pendente' }}
                </span>

                <div class="task-actions">

                    <a href="{{ route('tarefas.edit', $tarefa->id) }}"
                       class="btn btn-primary">
                        Editar
                    </a>

                    <form action="{{ route('tarefas.toggle', $tarefa->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <button type="submit" class="btn btn-success">
                            {{ $tarefa->status ? 'Reabrir' : 'Concluir' }}
                        </button>
                    </form>

                    <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger"
                                onclick="return confirm('Deseja realmente excluir esta tarefa?')">
                            Excluir
                        </button>
                    </form>

                </div>

            </div>

        </div>

    @empty

        <div class="card">
            <p>Nenhuma tarefa encontrada.</p>
        </div>

    @endforelse

</div>

{{-- PAGINAÇÃO --}}
@if($tarefas->hasPages())
    <div style="margin-top:25px;">
        {{ $tarefas->withQueryString()->links() }}
    </div>
@endif

@endsection