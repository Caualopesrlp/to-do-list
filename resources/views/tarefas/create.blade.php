@extends('layouts.app')

@section('title', 'Nova Tarefa')

@section('content')

    <h2>Nova Tarefa</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('tarefas.store') }}" method="POST">

        @csrf

        <div>
            <label for="tarefa">Tarefa</label><br>
            <input
                type="text"
                id="tarefa"
                name="tarefa"
                value="{{ old('tarefa') }}"
            >
        </div>

        <br>

        <div>
            <label for="descricao">Descrição</label><br>
            <textarea
                id="descricao"
                name="descricao"
            >{{ old('descricao') }}</textarea>
        </div>

        <br>

        <div>
            <label for="prioridade">Prioridade</label><br>

            <select name="prioridade" id="prioridade">
                <option value="baixa">Baixa</option>
                <option value="media">Média</option>
                <option value="alta">Alta</option>
            </select>
        </div>

        <br>

        <br>

        <button type="submit">
            Salvar
        </button>

    </form>

@endsection