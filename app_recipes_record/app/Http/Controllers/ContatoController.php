<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();
        
        return view('site.contato', ['motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar (Request $request){
        //ATENÇÃO! O request vai pegar o nome dos INPUTS lá da view, não é o nome do campo no bd
        $request->validate([
            'nome'=>'required|min:3|max:40',
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required|max:2000',
        ]);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
