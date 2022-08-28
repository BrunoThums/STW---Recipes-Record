<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Middleware\AutenticacaoMiddleware;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        if ($request->get('erro') == 1) {
            $erro = 'Usuário ou senha inválidos';
        }
        
        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar o login para ter acesso a página';
        }

        return view('site.acesso', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        //regras de validação
        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required',
        ];

        //feedback da validação
        $feedback = [
            'usuario.required' => 'O campo email é obrigatório',
            'usuario.email' => 'Email inválido',
            'senha.required' => 'O campo senha é obrigatório',
        ];

        //se não passar pelo validate
        $request->validate($regras, $feedback);


        $email = $request->get('usuario');
        $password = $request->get('senha');
        
        $user = new User();

        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();

        if (isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.cliente');

        } else {
           return redirect()->route('site.acesso', ['erro' => 1]);
        }

    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
