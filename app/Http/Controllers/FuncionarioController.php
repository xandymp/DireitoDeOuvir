<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Funcionario;
use Canducci\ZipCode\Facades\ZipCode;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::latest()->simplePaginate(10);

        return view('funcionario.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::pluck('nome', 'id');
        return view('funcionario.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'empresa' => 'required',
            'nome' => 'required',
            'email' => 'required',
        ]);

        $funcionario = new Funcionario();
        $this->salvarFuncionario($funcionario, $request);

        return redirect()->route('funcionario.index')
            ->with('success', 'Funcionário criado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        return view('funcionario.show', compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario)
    {
        $empresas = Empresa::pluck('nome', 'id');
        return view('funcionario.edit', compact('funcionario', 'empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        $request->validate([
            'empresa' => 'required',
            'nome' => 'required',
            'email' => 'required',
        ]);

        $this->salvarFuncionario($funcionario, $request);

        return redirect()->route('funcionario.index')
            ->with('success', 'Funcionario atualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();

        return redirect()->route('funcionario.index')
            ->with('success', 'Funcionário excluído');
    }

    private function salvarFuncionario(Funcionario $funcionario, Request $request)
    {
        $funcionario->empresa_id = $request->empresa;
        $funcionario->nome = $request->nome;
        $funcionario->email = $request->email;
        $funcionario->telefone = $request->telefone ?? null;
        $funcionario->CPF = $request->CPF ?? null;
        $funcionario->cep = $request->cep ?? null;
        $funcionario->endereco = $request->endereco ?? null;
        $funcionario->numero = $request->numero ?? null;
        $funcionario->complemento = $request->complemento ?? null;
        $funcionario->bairro = $request->bairro ?? null;
        $funcionario->cidade = $request->cidade ?? null;
        $funcionario->estado = $request->estado ?? null;
        $funcionario->save();
    }
}
