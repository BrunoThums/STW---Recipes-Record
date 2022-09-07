<?php

namespace App\Http\Controllers;
use App\Receita;
use App\Ingrediente;
use App\PreparoReceita;
use App\Unidade;
use Illuminate\Http\Request;

class PreparoReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredientes = Ingrediente::with('unidades')->get();
        //$pedido->produtos; //eager loading 
        return view('app.preparo_receita.create', ['receita' => $receita, 'ingredientes' => $ingredientes, compact('ingredientes')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Receita $receita)
    {
        $ingredientes = Ingrediente::all();
        //$pedido->produtos; //eager loading 
        return view('app.preparo_receita.create', ['receita' => $receita, 'ingredientes' => $ingredientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Receita $receita)
    {
        /*echo '<pre>';
        print_r($receita);
        echo'</pre>';
        echo'<hr>';
        echo'<pre>';
        print_r($request->all());
        echo'</pre>';*/
        $regras = [
            'quantidade' => 'required|numeric',
            'ordem' => 'required|integer',
            'receita_id' => 'exists:receitas,id',
            'ingrediente_id' => 'exists:ingredientes,id',
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'numeric' => 'O campo :attribute precisa ser um número',
            'integer' => 'O campo :attribute precisa ser um número',
            'receita_id.exists' => 'A receita informada não existe',
            'ingrediente_id.exists' => 'O ingrediente informado não existe',
        ];

        $request->validate($regras, $feedback);

        $preparoReceita = new PreparoReceita();
        $preparoReceita->receita_id = $receita->id;
        $preparoReceita->ingrediente_id = $request->get('ingrediente_id');
        $preparoReceita->quantidade = $request->get('quantidade');
        $preparoReceita->ordem = $request->get('ordem');
        $preparoReceita->save();
        
        //$receita->ingredientes //os registros do relacionamento entre eles
        /*$receita->ingredientes()->attach(
            $request->get('ingrediente_id'),
            ['quantidade' => $request->get('quantidade'),
            'ordem' => $request->get('ordem')]

        );*/

        return redirect()->route('preparo-receita.create', ['receita' => $receita->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

