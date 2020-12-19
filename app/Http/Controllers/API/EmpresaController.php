<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmpresaResource;
use App\Http\Resources\FuncionarioResource;
use App\Models\Empresa;
use App\Models\Funcionario;
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
        $empresas = Empresa::all();
        return response([ 'empresas' => EmpresaResource::collection($empresas)], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return response(['empresa' => new EmpresaResource($empresa)], 200);
    }

    public function funcionarios(Empresa $empresa)
    {
        $funcionarios = Funcionario::where('empresa_id', $empresa->id)
            ->get();
        return response([ 'funcionarios' => FuncionarioResource::collection($funcionarios)], 200);
    }
}
