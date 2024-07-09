<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Pegando as variáveis de ambiente --}}
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>Laravel - CRUD</h1>
        </header>
        <nav>
            <ul>
                {{-- Links para o cadastro --}}
                <li><a href="/vehicles">Início</a></li>
                <li><a href="/vehicles/create">Cadastro de Veículos</a></li>
            </ul>
        </nav>
        <div class="content">
            {{-- o conteúdo da view específica será injetado aqui! --}}
            @yield('content')
        </div>
        <footer>
            <div>
                <p>Aprendendo Laravel Framework</p>
                <p><a href="https://www.vrscreative.com.br" target="_blank">Igor Verissimo</a></p>
            </div>
            <div>
                <p>Aluno Igor Marques Verissimo dos Santos</p>
                <p><a href="https://www.vrscreative.com.br" target="_blank">vrscreative.com.br</a></p>
            </div>
        </footer>
    </div>
</body>
</html>