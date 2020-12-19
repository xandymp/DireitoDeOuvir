@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="empresa/create" class="btn btn-primary mb-2">Nova empresa</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Website</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->id }}</td>
                            <td>{{ $empresa->nome }}</td>
                            <td>{{ $empresa->email }}</td>
                            <td>{{ $empresa->website }}</td>
                            <td>
                                <a href="empresa/{{$empresa->id}}" class="btn btn-primary">Exibir</a>
                                <a href="empresa/{{$empresa->id}}/edit" class="btn btn-primary">Editar</a>
                                <form action="empresa/{{$empresa->id}}" method="post" class="d-inline">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $empresas->links() }}
            </div>
        </div>
    </div>
@endsection
