@extends('layouts.app')

@section('title', 'Editar Tarefa')

@section('content')

    <h2>Editar Tarefa</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div>
            <label for="tarefa">Tarefa</label><br>
            <input
                type="text"
                id="tarefa"
                name="tarefa"
                value="{{ old('tarefa', $tarefa->tarefa) }}"
            >
        </div>

        <br>

        <div>
            <label for="descricao">Descrição</label><br>
            <textarea
                id="descricao"
                name="descricao"
            >{{ old('descricao', $tarefa->descricao) }}</textarea>
        </div>

        <br>

        <div>
            <label for="prioridade">Prioridade</label><br>

            <select name="prioridade" id="prioridade">

                <option value="baixa"
                    {{ old('prioridade', $tarefa->prioridade) == 'baixa' ? 'selected' : '' }}>
                    Baixa
                </option>

                <option value="media"
                    {{ old('prioridade', $tarefa->prioridade) == 'media' ? 'selected' : '' }}>
                    Média
                </option>

                <option value="alta"
                    {{ old('prioridade', $tarefa->prioridade) == 'alta' ? 'selected' : '' }}>
                    Alta
                </option>

            </select>
        </div>

        <br>

        <br>

        <button type="submit">
            Atualizar
        </button>

    </form>

@endsection