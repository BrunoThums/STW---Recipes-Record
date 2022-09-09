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
            'email' => 'required|email',
            'senha' => 'required',
        ];

        //feedback da validação
        $feedback = [
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'Email inválido',
            'senha.required' => 'O campo senha é obrigatório',
        ];

        //se não passar pelo validate
        $request->validate($regras, $feedback);


        $email = $request->get('email');
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

            return redirect()->route('ingrediente.index');

        } else {
           return redirect()->route('site.acesso', ['erro' => 1]);
        }

    }


    public function index_register(Request $request)
    {
        return view('site.registro');
    }
    
    public function register(Request $request)
    {
        $regras = [
            'name' => 'required|min:3|max:40',
            'email' => 'required|email',
            'password' => 'required',
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'email.email' => 'Email inválido',
            'min' => 'O campo :attribute deve ter no mínimo 3 caracteres',
            'max' => 'O campo :attribute deve ter no máximo 40 caracteres',
        ];

        $request->validate($regras, $feedback);
        
        User::create($request->all());
        return redirect()->route('site.acesso');
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
