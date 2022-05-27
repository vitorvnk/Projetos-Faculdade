@extends('layouts.app')
@section('title', $title)
@section('content')


<body id="register_book">
    <div class="mb-4" >
            <h2 class="display-6">Cadastrar Livro</h2>
            <a href="{{ route('dashboard.index') }}">
                <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
            </a>
    </div>

    <form method="post" class="text-black mb-5" enctype="multipart/form-data" action="{{ route('dashboard.store') }}">
        @csrf
        @include('layouts.admin.books.form', [
            'auth' => 'Adicione Escritores',
            'categ'=> 'Adicione Categorias'
        ])
        
        <div class="mx-auto" style="width: 120px;">
            <button type="submit" class="btn btn_base success text-center">Registrar</button>
        </div>
    </form>

</body>


<!-- REGISTRO DE ESCRITORES -->
<div class="modal fade" id="authors" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Escritores</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('author.store') }}" method="post" >
                @csrf
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="form-group col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="inputs" name="name" value="{{ old('name') }}" required>
                                <label for="floatingInput">Nome</label>
                                <small class="form-text text-danger">{{$errors->first('name') }}</small>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="inputs" name="birthdate" value="{{ old('birthdate') }}" max="{{$date}}" required>
                                <label for="floatingInput">Data de Nascimento</label>
                                <small class="form-text text-danger">{{$errors->first('birthdate') }}</small>
                            </div>
                            
                        </div>
                        <div class="form-group col-lg-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="inputs" name="description" cols="30" rows="5" required>{{ old('description') }}</textarea>
                                <label for="floatingInput">Descrição</label>
                                <small class="form-text text-danger">{{$errors->first('description') }}</small>
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

<!-- REGISTRO DE CATEGORIAS -->
<div class="modal fade" id="categories" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Categorias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('categorie.store') }}" method="post" >
                @csrf
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="form-group col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="inputs" name="name" value="{{ old('name') }}" required>
                                <label for="floatingInput">Nome</label>
                                <small class="form-text text-danger">{{$errors->first('name') }}</small>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="inputs" name="description" cols="30" rows="5">{{ old('description') }}</textarea>
                                <label for="floatingInput">Descrição</label>
                                <small class="form-text text-danger">{{$errors->first('description') }}</small>
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