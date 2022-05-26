@extends('layouts.app')
@section('title', 'Funcionarios')
@section('content')


<body id="employess">
    <div class="mb-4">
        <h2 class="display-5">Funcionários</h2>
        <a href="{{ route('funcionarios.create') }}">
            <button type="submit" class="btn btn_base primary">Cadastrar</button>    
        </a>
    </div>

    <table class="table table-light table-striped text-center">
        <thead>
            <tr>
                <th></th>
                <th>Usuário</th>
                <th>E-mail</th>
                <th style="width:200px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href='{{ route('funcionarios.show', ['funcionario' => $user->id]) }}'>
                            <button type='button' class='btn btn_base second'>Editar</button>
                        </a>
                        <a href='{{ route('funcionarios.edit', ['funcionario' => $user->id]) }}'>
                            <button type='button' class='btn btn_base fail'>Excluir</button>
                        </a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
        @include('layouts.admin.paginate', [
            'data' => $users
        ])
</body>
@endsection