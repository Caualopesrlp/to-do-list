<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'To Do List')</title>
</head>
<body>

    <header>
        <h1>To Do List</h1>

        <nav>
            <a href="{{ route('tarefas.index') }}">Lista de tarefas</a>
            |
            <a href="{{ route('tarefas.create') }}">Nova tarefa</a>
        </nav>

        <hr>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>