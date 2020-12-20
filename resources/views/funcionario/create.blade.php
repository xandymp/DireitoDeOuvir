@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Novo Funcionário') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/funcionario" method="post">
                            @csrf
                            <div class="form-group{{ $errors->has('empresa') ? ' has-error' : '' }}">
                                <label for="empresa">Empresa</label>
                                <select name="empresa" id="empresa" class="form-control" required autofocus>
                                    @foreach($empresas as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" name="nome" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">CPF</label>
                                <input type="text" name="CPF" class="form-control CPF" required>
                            </div>
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Telefone</label>
                                <input type="text" name="telefone" class="form-control telefone">
                            </div>
                            <div class="form-group">
                                <label for="">CEP</label>
                                <input type="text" name="cep" class="form-control cep-mask">
                            </div>
                            <div class="form-group">
                                <label for="">Endereço</label>
                                <input type="text" name="endereco" class="form-control" id="endereco">
                            </div>
                            <div class="form-group">
                                <label for="">Número</label>
                                <input type="text" name="numero" class="form-control" id="numero">
                            </div>
                            <div class="form-group">
                                <label for="">Complemento</label>
                                <input type="text" name="complemento" class="form-control" id="complemento">
                            </div>
                            <div class="form-group">
                                <label for="">Bairro</label>
                                <input type="text" name="bairro" class="form-control" id="bairro">
                            </div>
                            <div class="form-group">
                                <label for="">Cidade</label>
                                <input type="text" name="cidade" class="form-control" id="cidade">
                            </div>
                            <div class="form-group">
                                <label for="">Estado</label>
                                <input type="text" name="estado" class="form-control" id="estado">
                            </div>

                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
