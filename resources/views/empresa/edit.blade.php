@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Empresa') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/empresa/{{ $empresa->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" name="nome" class="form-control" value="{{ $empresa->nome }}">
                            </div>
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <input type="email" name="email" class="form-control" value="{{ $empresa->email }}">
                            </div>
                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" name="website" class="form-control" value="{{ $empresa->website }}">
                            </div>
                            <div class="form-group">
                                <label for="">Logo</label>
                                <input type="text" name="logo" class="form-control" value="{{ $empresa->logo }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
