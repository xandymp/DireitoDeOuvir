@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dados do Funcionário') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <strong>ID:</strong> {{ $funcionario->id }} <br />
                            <strong>Empresa:</strong> {{ $funcionario->empresa->nome }} <br />
                            <strong>Nome:</strong> {{ $funcionario->nome }} <br />
                            <strong>E-mail:</strong> {{ $funcionario->email }} <br />
                            <strong>Telefone:</strong> {{ $funcionario->telefone }} <br />
                            <strong>CPF:</strong> {{ $funcionario->CPF }} <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
