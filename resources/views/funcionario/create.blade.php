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
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" name="nome" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Telefone</label>
                                <input type="text" name="telefnoe" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">CPF</label>
                                <input type="text" name="CPF" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
