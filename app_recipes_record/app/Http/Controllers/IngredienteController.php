<?php

namespace App\Http\Controllers;

use App\Ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredientes = Ingrediente::paginate(10);
        return view('app.ingredientes.index', ['ingredientes' => $ingredientes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredientes = Ingrendiente::all();
        return view('app.ingrediente.create', ['ingredientes' => $ingredientes]);
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
            'codigo' => 'integer|required',
            'nome' => 'required|min:3|max:40',
            'unidade_id' => 'exists:unidades,id',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo :attribute deve ter no máximo 40 caracteres',
            'integer' => 'O campo :attribute deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe'
        ];

        $request->validate($regras, $feedback);
        Produto::Create($request->all());
        return redirect()->route('produto.index');
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
        $ingredientes = Ingredientes::all();
        return view('app.ingrediente.edit', ['ingrediente' =>$ingrediente, 'ingredientes' => $ingredientes]);
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
        return redirect()->route('ingrediente.show', ['ingrediente' => $ingrediente->id]);
    }
}
