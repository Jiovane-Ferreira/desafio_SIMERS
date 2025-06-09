<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>


<!-- Página de Layout principal, seguindo os padrões de criação do Blade --> 

<body>
    <header class="header">
        <div class="container">
            <h1 class="logo">Cadastro de Usuários</h1>
            <nav class="nav">
                <a href="{{ route('usuarios.index') }}" class="nav-link">Lista de Usuários</a>
                <a href="{{ route('usuarios.create') }}" class="nav-link">Novo Usuário</a>
            </nav>
        </div>
    </header>

    <main class="main container">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <p>Sistema de Cadastro &copy; {{ date('Y') }}</p>
        </div>
    </footer>
</body>
</html>