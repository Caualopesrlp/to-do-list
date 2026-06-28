<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'To Do List')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <header class="header">

        <div class="wrapper">

            <a href="{{ route('tarefas.index') }}" class="logo">
                To Do List
            </a>

            <a href="{{ route('tarefas.create') }}" class="btn btn-primary">
                + Nova tarefa
            </a>

        </div>

    </header>

    <main class="wrapper">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>

</html>