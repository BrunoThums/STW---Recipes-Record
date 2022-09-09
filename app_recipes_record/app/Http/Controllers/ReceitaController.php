<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Receita;
use App\User;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $receitas = Receita::paginate(10);
        return view('app.receita.index', ['receitas'=>$receitas, 'request'=> $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Receita $receita)
    {
        $users = User::all();
        return view('app.receita.create', ['receita'=>$receita, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'user_id' => 'exists:users,id',
            'nome' => 'required|unique:receitas,nome|min:3|max:50',
            'codigo' => 'required|integer|unique:receitas,codigo'
        ];

        $feedback = [
            'user_id.exists' => 'Selecione um usuário válido',
            'nome.unique' => 'Esta receita já existe',
            'min' => 'O campo :attribute deve ter no mínimo 3 caracteres',
            'max' => 'O campo :attribute deve ter no máximo 50 caracteres',
            'required'=> 'O campo :attribute deve ser preenchido',
            'integer' => 'O campo :attribute deve ser um número inteiro',
            'unique' => 'Este :attribute já está cadastrado'
        ];

        $request->validate($regras, $feedback);

        $receita= new Receita();
        $receita->user_id = $request->get('user_id');
        $receita->nome = $request->get('nome');
        $receita->codigo = $request->get('codigo');
        $receita->save();

        return redirect()->route('receita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function show(Receita $receita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function edit(Receita $receita)
    {
        $users = User::all();
        return view('app.receita.edit', ['receita'=>$receita, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receita $receita)
    {
        $receita->update($request->all());
        return redirect()->route('receita.index', ['receita' => $receita->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receita $receita)
    {
        $receita->ingredientes()->detach();
        $receita->delete();
        return redirect()->route('receita.index', ['receita' => $receita->id]);
    }
}
