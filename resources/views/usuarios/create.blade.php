@extends('layouts.app')

@section('content')

<!-- Página de criação do usuário  -->
 
    <h1>Novo Usuário</h1>

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf <!-- Adiciona um Token CSRF -->

        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>CPF:</label><br>
        <input type="text" name="cpf" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Data de Nascimento:</label><br>
        <input type="date" name="data_nascimento" required><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <br>
    <a href="{{ route('usuarios.index') }}">Voltar à Lista</a>
@endsection
