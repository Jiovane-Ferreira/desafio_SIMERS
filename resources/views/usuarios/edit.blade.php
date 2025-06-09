@extends('layouts.app')

@section('content')

    
    <div class="form-container">

    <h1>Editar Usuário</h1>

        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT') 

            <label>Nome:</label>
            <input type="text" name="nome" value="{{ $usuario->nome }}" required>

            <label>Email:</label>
            <input type="email" name="email" value="{{ $usuario->email }}" required>

            <label>Data de Nascimento:</label>
            <input type="date" name="data_nascimento" value="{{ $usuario->data_nascimento }}" required>

            <label>Telefone:</label>
            <input type="text" name="telefone" value="{{ $usuario->telefone }}" required>

            <label>Senha (deixe em branco para manter a atual):</label>
            <input type="password" name="senha">

            <button type="submit" class="btn btn-edit">Salvar Alterações</button>
        </form>

        
        <a href="{{ route('usuarios.index') }}" class="btn btn-return">Voltar à Lista</a>
    </div>
@endsection
