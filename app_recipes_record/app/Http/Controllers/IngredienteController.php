<?php

namespace App\Http\Controllers;

use App\Ingrediente;
use App\Unidade;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ingredientes = Ingrediente::paginate(10);
        
        return view('app.ingrediente.index', ['ingredientes' => $ingredientes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.ingrediente.create', ['unidades' => $unidades]);
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
            //'unidade_id' => 'exists:<tabela>, <coluna>',
            'codigo' => 'required|integer|unique:ingredientes,codigo',
            'descricao' => 'required|min:3|max:40',
            'unidade_id' => 'exists:unidades,id',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo :attribute deve ter no máximo 40 caracteres',
            'integer' => 'O campo :attribute deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'unique' => 'Este :attribute já está cadastrado'
        ];

        $request->validate($regras, $feedback);
        Ingrediente::Create($request->all());
        return redirect()->route('ingrediente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function show(Ingrediente $ingrediente)
    {
        return view('app.ingrediente.show', ['ingrediente' =>$ingrediente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingrediente $ingrediente)
    {
        $unidades = Unidade::all();
        return view('app.ingrediente.edit', ['ingrediente' =>$ingrediente, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingrediente $ingrediente)
    {
        $ingrediente->update($request->all());
        return redirect()->route('ingrediente.show', ['ingrediente' => $ingrediente->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingrediente $ingrediente)
    {
        $ingrediente->delete();
        return redirect()->route('ingrediente.index', ['ingrediente' => $ingrediente->id]);
    }
}
