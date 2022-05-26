@extends('layouts.app')
@section('title', $title)
@section('content')


<body id="view_book">
    <div class="mb-4" >
            <h2 class="display-6">Detalhes</h2>
            <a href="{{ route('dashboard.index') }}">
                <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
            </a>
    </div>

    <div class="row">
        <div class="col-8">
            <table  class="table table-borderless mb-3 text-justify">
                <tr>
                    <th>Titulo</th>
                    <td>{{ $book->title }}</td>
                </tr>
                <tr>
                    <th>Descrição</th>
                    <td>{{ $book->description }}</td>
                </tr>
                <tr>
                    <th>Ano de Lançamento</th>
                    <td>{{ date('d/m/Y', strtotime($book->date)) }}</td>
                </tr>
                <tr>
                    <th>Categoria</th>
                    <td>{{ $book->categorie->name }}</td>
                </tr>
                <tr>
                    <td> <hr> </td>
                    <td> <hr> </td>
                </tr>
                <tr>
                    <th>Autor</th>
                    <td>{{ $book->author->name }}</td>
                </tr>
                <tr>
                    <th>Nascimento do Autor</th>
                    <td>{{ $book->author->birthdate->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Mais sobre o Autor</th>
                    <td>{{ $book->author->description }}</td>
                </tr>
            </table>
        </div>
        <div class="col text-center">
            <img src='{{ asset("uploads/$book->img") }}'>
            <div class="mt-3">
                <a href='{{ route('alugar.create',  ['book' => $book]) }}'><button type='button' class='btn btn-sm btn_base success'>Alugar</button></a>
                <a href='#' data-bs-toggle="modal" data-bs-target="#update"><button type='button' class='btn btn_base second'>Editar</button></a>
                <a href='#' data-bs-toggle="modal" data-bs-target="#delete"><button type='button' class='btn btn_base fail'>Deletar</button></a>
            </div>
        </div>
    </div>

</body>



<!-- CONFIRMAÇÃO DE DELETE -->
<div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deletar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action=" {{ route('dashboard.destroy', ['dashboard' => $book]) }} " method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Você realmente deseja deletar esse livro?<br>Essa ação é <b>irreversível</b> e será excluído os registros que referenciam esse livro.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn_base grey" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn_base fail">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- EDIÇÃO DOS LIVROS -->
<div class="modal fade" id="update" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Atualizar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action=" {{ route('dashboard.update', ['dashboard' => $book]) }}   " method="post" class="text-black" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    @include('layouts.admin.books.form',[
                        'book' => $book
                    ])
                <div class="modal-footer">
                    <button type="button" class="btn btn_base grey" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn_base success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection