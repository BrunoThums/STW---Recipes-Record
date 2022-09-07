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
            'codigo' => 'required|integer|unique:receitas,codigo'
        ];

        $feedback = [
            'user_id.exists' => 'O cliente informado não existe',
            'required'=> 'O campo :attribute é obrigatório',
            'integer' => 'O campo :attribute deve ser um número inteiro',
            'unique' => 'Este :attribute já está cadastrado'
        ];

        $request->validate($regras, $feedback);

        $receita= new Receita();
        $receita->user_id = $request->get('user_id');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receita $receita)
    {
        //
    }
}
