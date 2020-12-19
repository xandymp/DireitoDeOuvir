@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Funcionário') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/funcionario/{{ $funcionario->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group{{ $errors->has('empresa') ? ' has-error' : '' }}">
                                <label for="empresa">Empresa</label>
                                <select name="empresa" id="empresa" class="form-control" required autofocus>
                                    @foreach($empresas as $key => $value)
                                        @if($key == $funcionario->empresa_id)
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" name="nome" class="form-control" value="{{ $funcionario->nome }}">
                            </div>
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <input type="email" name="email" class="form-control" value="{{ $funcionario->email }}">
                            </div>
                            <div class="form-group">
                                <label for="">Telefone</label>
                                <input type="text" name="telefone" class="form-control" value="{{ $funcionario->telefone }}">
                            </div>
                            <div class="form-group">
                                <label for="">CPF</label>
                                <input type="text" name="CPF" class="form-control" value="{{ $funcionario->CPF }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
