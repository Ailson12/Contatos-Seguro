<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos=Auth::user()->contatos;
       return view('contato.index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contato.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
    //   $usuario = Auth::user();
    //   Contato::create([
    //     'nome'=>$request->nome,
    //     'telefone'=>$request->telefone,
    //     'user_id'=>$usuario->id
    //   ]);
        try {
            Auth::user()->contatos()->create($request->all());
            flash('Salvo com Sucesso')->success();
        } catch (\Exception $e) {
            flash ('Ocorreu um erro ao Salvar')->error();
            return back()->withInput(); //caso ocorra um erro vai retornar para a pagina anterio, trazendo os dados ja cadastrados
        }
        return redirect()->route('contatos.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show(Contato $contato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contato $contato)
    {
        return view('contato.form', compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contato $contato)
    {
        try {
            $contato->update($request->all());
            flash('Atualizado com Sucesso')->success();
        } catch (\Exception $e) {
            flash ('Ocorreu um erro ao Atualizar')->error();
            return back()->withInput(); //caso ocorra um erro vai retornar para a pagina anterio, trazendo os dados ja cadastrados
        }
        return redirect()->route('contatos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contato $contato)
    {
        //
    }
}
