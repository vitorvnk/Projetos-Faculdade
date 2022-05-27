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

    <form method="post" class="text-black" action="{{ $title == 'Adicionar' ? route('funcionarios.store') : route('funcionarios.update', ['funcionario'=>$user->id]) }}">
        @csrf
        @if ($title != 'Adicionar')
            @method('PUT')
        @endif
        <div>
            <div class="row my-2">
                <div class="col-lg-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="inputs" name="name"  value="{{ $employeer->name ?? old('name') }}">
                        <label for="floatingInput">Nome</label>
                        <small class="form-text text-danger">{{$errors->first('name') }}</small>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-lg-4"> 
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control cpf" id="inputs" name="cpf" value="{{  $employeer->cpf  ?? old('cpf') }}"   >
                            <label for="floatingInput">CPF</label>
                            <small class="form-text text-danger">{{$errors->first('cpf') }}</small>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-4"> 
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rg" id="inputs" name="rg" value="{{  $employeer->rg  ?? old('rg') }}"   >
                            <label for="floatingInput">RG</label>
                            <small class="form-text text-danger">{{$errors->first('rg') }}</small>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-4"> 
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="inputs" name="birthdate" value="{{   $employeer->birthdate  ?? old('birthdate') }}" max="{{$today}}">
                            <label for="floatingInput">Data de Nascimento</label>
                            <small class="form-text text-danger">{{$errors->first('birthdate') }}</small>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-lg-6"> 
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control salary" id="inputs" name="salary" value="{{ $employeer->salary  ?? old('salary') }}">
                            <label for="floatingInput">Salário</label>
                            <small class="form-text text-danger">{{$errors->first('salary') }}</small>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-6"> 
                    <div class="form-group">
                        <label for="departament_id">Departamento</label><br>
                        <select name="departament_id" id="inputs" class="col-lg-12">
                            <option value=''selected disabled>Selecione</option>

                            @foreach ($departaments as $departament)
                                @if ( (!is_null($employeer)) && $departament->id == $employeer->departament_id)
                                    <option value='{{ $departament->id }}' selected>{{ $departament->name }}</option>
                                @else
                                    <option value='{{ $departament->id }}'>{{ $departament->name }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                    <small class="form-text text-danger">{{$errors->first('departament_id') }}</small>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-lg-12"> 
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="inputs" name="email" value="{{ $user->email ?? old('email') }}">
                            <label for="floatingInput">E-mail</label>
                            <small class="form-text text-danger">{{$errors->first('email') }}</small>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <textarea name="address" class="form-control" id="inputs">{{  $employeer->address ?? old('address') }}</textarea>
                            <label for="floatingInput">Endereço</label>
                            <small class="form-text text-danger">{{$errors->first('address') }}</small>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row my-2" >
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="inputs" name="password" >
                            <label for="floatingInput">Senha</label>
                            <small class="form-text text-danger">{{$errors->first('password') }}</small>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="inputs" name="password_confirmation" min="8">
                            <label for="floatingInput">{{ $title == 'Adicionar' ? 'Confirmar Senha' : 'Nova Senha' }}</label>
                            <small class="form-text text-danger">{{$errors->first('password_confirmation') }}</small>
                        </div> 
                    </div>
                </div>
            </div>

            <div class="mx-auto" style="width: 120px;">
                <button type="submit" class="btn btn_base success text-center">Salvar</button>
            </div>
            
        </div>             
    </form>
</body>


@endsection