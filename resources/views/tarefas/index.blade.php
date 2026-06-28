@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('content')

    <h2>Lista de Tarefas</h2>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('tarefas.index') }}" method="GET">
        <input
            type="text"
            name="search"
            placeholder="Pesquisar tarefa..."
            value="{{ request('search') }}"
        >

        <button type="submit">Buscar</button>
    </form>

    <br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Tarefa</th>
                <th>Descrição</th>
                <th>Prioridade</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

        @forelse($tarefas as $tarefa)

            <tr>

                <td>{{ $tarefa->tarefa }}</td>

                <td>{{ $tarefa->descricao }}</td>

                <td>{{ ucfirst($tarefa->prioridade) }}</td>

                <td>
                    @if($tarefa->status)
                        ✔ Concluída
                    @else
                        ⏳ Pendente
                    @endif
                </td>

                <td>

                    {{-- EDITAR --}}
                    <a href="{{ route('tarefas.edit', $tarefa->id) }}">
                        Editar
                    </a>

                    {{-- TOGGLE STATUS --}}
                    <form action="{{ route('tarefas.toggle', $tarefa->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('PATCH')

                        @if($tarefa->status)
                            <button type="submit">Desmarcar</button>
                        @else
                            <button type="submit">Concluir</button>
                        @endif

                    </form>

                    {{-- EXCLUIR --}}
                    <form action="{{ route('tarefas.destroy', $tarefa->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Excluir
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="5">
                    Nenhuma tarefa encontrada.
                </td>
            </tr>

        @endforelse

        </tbody>
    </table>

@endsection