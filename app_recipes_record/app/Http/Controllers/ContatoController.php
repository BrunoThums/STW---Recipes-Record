<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {

        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required|unique:site_contatos',
            'email' => 'required|email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'required' => 'O campo :attribute precisa ser preenchido',
            'min' => 'O campo :attribute precisa ter no mínimo 3 caracteres',
            'max' => 'O campo :attribute precisa ter no máximo 40 caracteres',
            'unique' => 'O campo :attribute informado já está em uso',

            'email.email' => 'O email informado não é válido',
            'mensagem.max' => 'O campo mensagem precisa ter no máximo 2000 caracteres'
        ];
        //ATENÇÃO! O request vai pegar o nome dos INPUTS lá da view, não é o nome do campo no bd
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
