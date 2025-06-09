<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


// O Controller recebe as requisições do navegador, manipula os dados com a Model e retorna para a view adequada.
// Dessa maneira o código fica estruturado e dividido por compartimentos.

class UsuarioController extends Controller


{

    //função que lista todos os usuários e os envia para a view index.

    public function index() {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    // função que mostra a tela para criar novos usuários
    public function create() {
        return view('usuarios.create');
    }

    // a função store, valida os dados recebidos pelo formulário através da Request.
    // Em seguida ela cria um novo registro na tabela, tomando cuidado para criptografar a senha.
    // por fim, retorna para a Index.
    
    public function store(Request $request) {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:usuarios',
            'email' => 'required|email|unique:usuarios',
            'data_nascimento' => 'required|date',
            'telefone' => 'required',
            'senha' => 'required|min:6',
        ]);

        Usuario::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'telefone' => $request->telefone,
            'senha' => Hash::make($request->senha),
        ]);

        return redirect()->route('usuarios.index');
    }

    // Essa função, recebe o parâmetro id (recebido da Rota via GET) e procura o usuário
    // Retorna depois para a tela de edição.

    public function edit($id) {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    // Busca novamente por id o usuário, faz a validação dos dados.
    // Em seguida, faz o update do registro no Banco de Dados.
    // Retorna para o index ao final
    
    public function update(Request $request, $id) {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:usuarios,email,'.$id, // (SELECT * FROM usuarios WHERE email = 'usuario@email' AND id != $id;)
            'data_nascimento' => 'required|date',
            'telefone' => 'required',
            'senha' => 'nullable|min:6',
        ]);

        $usuario->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'telefone' => $request->telefone,
            'senha' => $request->senha ? Hash::make($request->senha) : $usuario->senha, //Operador ternário, para em caso de não ter mudança, manter a senha antiga
        ]);

        return redirect()->route('usuarios.index');
    }

    // Busca o usuário e então "destrói/deleta" o usuário com o ID informado
    // Retorna para a página index depois.
    
    public function destroy($id) {
        Usuario::destroy($id);
        return redirect()->route('usuarios.index');
    }
}
