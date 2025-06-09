@extends('layouts.app')

@section('content')

<!-- Página de edição do usuário  -->

    <h1>Editar Usuário</h1>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <label>Nome:</label><br>
        <input type="text" name="nome" value="{{ $usuario->nome }}" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ $usuario->email }}" required><br><br>

        <label>Data de Nascimento:</label><br>
        <input type="date" name="data_nascimento" value="{{ $usuario->data_nascimento }}" required><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" value="{{ $usuario->telefone }}" required><br><br>

        <label>Senha (deixe em branco para manter a atual):</label><br>
        <input type="password" name="senha"><br><br>

        <button type="submit">Salvar Alterações</button>
    </form>

    <br>
    <a href="{{ route('usuarios.index') }}">Voltar à Lista</a>
@endsection
