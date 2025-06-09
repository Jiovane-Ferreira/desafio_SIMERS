@extends('layouts.app')

@section('content')

    

    <div class="form-container">

    <h1>Novo Usuário</h1>

        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf <!-- Adiciona um Token CSRF -->

            <label>Nome:</label>
            <input type="text" name="nome" required>

            <label>CPF:</label>
            <input type="text" name="cpf" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Data de Nascimento:</label>
            <input type="date" name="data_nascimento" required>

            <label>Telefone:</label>
            <input type="text" name="telefone" required>

            <label>Senha:</label>
            <input type="password" name="senha" required>

            <button type="submit" class="btn btn-edit">Cadastrar</button>
        </form>

        
        <a href="{{ route('usuarios.index') }}" class="btn btn-return">Voltar à Lista</a>
    </div>
@endsection
