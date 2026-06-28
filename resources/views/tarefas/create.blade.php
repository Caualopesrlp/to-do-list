@extends('layouts.app')

@section('title', 'Nova Tarefa')

@section('content')

<h2>Nova tarefa</h2>

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

    <form action="{{ route('tarefas.store') }}" method="POST">

        @csrf

        <div class="form-group">

            <label for="tarefa">
                Nome da tarefa
            </label>

            <input
                type="text"
                id="tarefa"
                name="tarefa"
                value="{{ old('tarefa') }}"
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
            >{{ old('descricao') }}</textarea>

        </div>

        <div class="form-group">

            <label for="prioridade">
                Prioridade
            </label>

            <select
                id="prioridade"
                name="prioridade"
            >

                <option value="baixa"
                    {{ old('prioridade') == 'baixa' ? 'selected' : '' }}>
                    Baixa
                </option>

                <option value="media"
                    {{ old('prioridade') == 'media' ? 'selected' : '' }}>
                    Média
                </option>

                <option value="alta"
                    {{ old('prioridade') == 'alta' ? 'selected' : '' }}>
                    Alta
                </option>

            </select>

        </div>

        <div class="task-actions">

            <button
                type="submit"
                class="btn btn-success"
            >
                Salvar tarefa
            </button>

            <a
                href="{{ route('tarefas.index') }}"
                class="btn btn-secondary"
            >
                Cancelar
            </a>

        </div>

    </form>

</div>

@endsection