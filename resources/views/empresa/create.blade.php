@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Nova Empresa') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/empresa" method="post">
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
                                <label for="">Website</label>
                                <input type="text" name="website" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Logo</label>
                                <input type="text" name="logo" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
