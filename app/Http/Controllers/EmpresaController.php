<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::latest()->simplePaginate(10);

        return view('empresa.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
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
            'nome' => 'required',
            'email' => 'required',
        ]);

        $empresa = new Empresa();
        $empresa->nome = $request->nome;
        $empresa->email = $request->email;
        $empresa->website = $request->website ?? null;
        $empresa->logo = $request->logo ?? null;
        $empresa->save();

        return redirect()->route('empresa.index')
            ->with('success', 'Empresa criada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('empresa.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
        ]);

        $empresa->nome = $request->nome;
        $empresa->email = $request->email;
        $empresa->website = $request->website ?? null;
        $empresa->logo = $request->logo ?? null;
        $empresa->save();

        return redirect()->route('empresa.index')
            ->with('success', 'Empresa atualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        if ($empresa->funcionarios()->count() <= 0) {
            $empresa->delete();

            return redirect()->route('empresa.index')
                ->with('success', 'Empresa excluída');
        }

        return redirect()->route('empresa.index')
            ->with('error', 'Não é possível excluir empresa com funcionários cadastrados.');
    }
}
