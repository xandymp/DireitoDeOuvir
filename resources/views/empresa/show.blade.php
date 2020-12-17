@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dados da Empresa') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <strong>ID:</strong> {{ $empresa->id }} <br />
                            <strong>Nome:</strong> {{ $empresa->nome }} <br />
                            <strong>E-mail:</strong> {{ $empresa->email }} <br />
                            <strong>Website:</strong> {{ $empresa->website }} <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
