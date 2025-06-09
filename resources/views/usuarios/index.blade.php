@extends('layouts.app')

@section('content')

<!-- Exibe a tabela na página principal, utilizando o foreach para exbição -->
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->cpf }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->data_nascimento }}</td>
                    <td>{{ $usuario->telefone }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>

                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach

<!-- Se não houver usuários então, exibe uma linha dizendo que não há nenhum usuário encontrado --> 
            @if ($usuarios->isEmpty())
                <tr>
                    <td colspan="6">Nenhum usuário cadastrado.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
