@extends('layouts.app')

@section('title', 'Editar Tarefa')

@section('content')

<h2>Editar tarefa</h2>

@if ($errors->any())

    <div class="alert alert-error">

        <ul>

            @foreach ($errors->all() as $erro)

                <li>{{ $erro }}</li>

            @endforeach

        </ul>

    </div>

@endif

<div class="card">

    <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">

            <label for="tarefa">
                Nome da tarefa
            </label>

            <input
                type="text"
                id="tarefa"
                name="tarefa"
                value="{{ old('tarefa', $tarefa->tarefa) }}"
                placeholder="Ex.: Estudar Laravel"
            >

        </div>

        <div class="form-group">

            <label for="descricao">
                Descrição
            </label>

            <textarea
                id="descricao"
                name="descricao"
                placeholder="Opcional..."
            >{{ old('descricao', $tarefa->descricao) }}</textarea>

        </div>

        <div class="form-group">

            <label for="prioridade">
                Prioridade
            </label>

            <select id="prioridade" name="prioridade">

                <option
                    value="baixa"
                    {{ old('prioridade', $tarefa->prioridade) == 'baixa' ? 'selected' : '' }}
                >
                    Baixa
                </option>

                <option
                    value="media"
                    {{ old('prioridade', $tarefa->prioridade) == 'media' ? 'selected' : '' }}
                >
                    Média
                </option>

                <option
                    value="alta"
                    {{ old('prioridade', $tarefa->prioridade) == 'alta' ? 'selected' : '' }}
                >
                    Alta
                </option>

            </select>

        </div>

        <div class="task-actions">

            <button
                type="submit"
                class="btn btn-success"
            >
                Salvar alterações
            </button>

            <a
                href="{{ route('tarefas.index') }}"
                class="btn btn-secondary"
            >
                Voltar
            </a>

        </div>

    </form>

</div>

@endsection