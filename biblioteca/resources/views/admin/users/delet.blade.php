@extends('layouts.app')
@section('title', $title )
@section('content')

<body id="form_employess" class="mb-5">
    <div class="mb-6" >
        <h2 class="display-6">{{$title}}</h2>
        <a href="{{ route('funcionarios.index') }}">
            <button type="submit" class="btn btn_base second"><ion-icon name="arrow-back-outline"></ion-icon></button>    
        </a>
    </div>

    <form method="post" action="{{ route('funcionarios.destroy', ['funcionario' => $user->id]) }}">
        @csrf
        @method('DELETE')
        <div class="form-group mt-4">
            <p>Você realmente deseja excluir usuário "<b>{{ $user->name }}</b>" com e-mail <b>"{{ $user->email }}</b>"?</p>
            <label for="floatingInput">Digite a senha</label>
            <input type="password" class="form-control" id="inputs" name="password">
            <small class="form-text text-danger">{{$errors->first('password') }}</small>
        </div>

        <div class="form-group mt-3 d-flex float-right">
            <button type="submit" class="btn btn_base fail">Excluir</button>
        </div>
    </form>
</body>

@endsection