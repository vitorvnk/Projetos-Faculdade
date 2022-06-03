@extends('layouts.app')
@section('title', $title)
@section('content')


<body id="alug_book">
    <div class="mb-4" >
            <h2 class="display-6">Alugar Livro</h2>
            <a href="{{ route('dashboard.index') }}">
                <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
            </a>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="text-center">
                <table  class='table table-dark'>
                    @if (!empty($reader_data))
                        <tr>
                            <td>Nome: {{$reader_data['name']}}</td>
                            <td>Email: {{$reader_data['email']}}</td>
                            <td>Aniversário: {{ $reader_data['birthdate']->format('d/m/Y')  }}</td>
                        </tr>
                    @else
                        <tr class='text-danger'>
                            <td>Não foi possível encontrar o leitor</td>
                        </tr>
                    @endif
                </table>
            </div>

            <form method="GET">
                <div class="mb-3">
                    <div class="input-group" id="inputs" >
                        <input type="text" class="form-control cpf" id="inputs" aria-describedby="reader" name="reader" value="{{$reader_data['cpf'] ?? old('reader_id')}}" onfocusout="submit()">
                        <button class="btn" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </div>
                    <a href='#' data-bs-toggle="modal" data-bs-target="#create_reader">Criar novo leitor</a>
                    <small class="form-text text-danger">{{$errors->first('reader_id') }}</small>
                </div>
            </form>

            <form action="{{ route('alugar.store', ['book' => $book]) }}" method="post">
                @csrf
                <div class="d-none">
                    <input type="text" name="reader_id" value="{{$reader_data['id'] ?? ''}}">
                </div>

                <div class="form-floating mb-3">
                    <input type="date" id="inputs"  class="form-control" aria-describedby="return_date" min="{{$today}}" name="return_date" value="{{ old('return_date') }}">
                    <label class="floatingInput" for="return_date">Data de devolução</label>
                    <small class="form-text text-danger">{{$errors->first('return_date') }}</small>
                </div>
                <div class="mx-auto" style="width: 120px;">
                    <button type="submit" class="btn btn_base success">Registrar</button>
                </div>
            </form>
        </div>
        <div class="col">
            <div class="text-center">
                <img src='{{ asset("uploads/$book->img") }}'>
            </div>
        </div>
    </div>
</body>


<!-- CRIAÇÃO DE LEITORES -->
<div class="modal fade" id="create_reader" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastro de Leitores</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('leitores.store')}}" method="post" class="text-black">
                @csrf
                <div class="modal-body">
                    <div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="inputs" name="name" value="{{ old('name') }}" required>
                                    <label for="floatingInput">Nome</label>
                                    <small class="form-text text-danger">{{$errors->first('name') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="inputs" name="birthdate" max="{{$today}}" value="{{ old('birthdate') }}" required>
                                    <label for="floatingInput">Data de Nascimento</label>
                                    <small class="form-text text-danger">{{$errors->first('birthdate') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="inputs" name="email" value="{{ old('email') }}" required>
                                    <label for="floatingInput">Email</label>
                                    <small class="form-text text-danger">{{$errors->first('email') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cpf" id="inputs" name="cpf" value="{{ old('cpf') }}" required>
                                    <label for="floatingInput">CPF</label>
                                    <small class="form-text text-danger">{{$errors->first('cpf') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rg" id="inputs" name="rg" value="{{ old('rg') }}" required>
                                    <label for="floatingInput">RG</label>
                                    <small class="form-text text-danger">{{$errors->first('rg') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="inputs" name="address" value="{{ old('address') }}" required>
                                    <label for="floatingInput">Endereço</label>
                                    <small class="form-text text-danger">{{$errors->first('address') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn_base grey" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn_base success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection