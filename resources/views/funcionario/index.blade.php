@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="funcionario/create" class="btn btn-primary mb-2">Novo funcionário</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Empresa</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>CPF</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($funcionarios as $funcionario)
                        <tr>
                            <td>{{ $funcionario->id }}</td>
                            <td>{{ $funcionario->empresa->nome }}</td>
                            <td>{{ $funcionario->nome }}</td>
                            <td>{{ $funcionario->email }}</td>
                            <td>{{ $funcionario->telefone }}</td>
                            <td>{{ $funcionario->CPF }}</td>
                            <td>
                                <a href="funcionario/{{$funcionario->id}}" class="btn btn-primary">Exibir</a>
                                <a href="funcionario/{{$funcionario->id}}/edit" class="btn btn-primary">Editar</a>
                                <form action="funcionario/{{$funcionario->id}}" method="post" class="d-inline">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $funcionarios->links() }}
            </div>
        </div>
    </div>
@endsection
