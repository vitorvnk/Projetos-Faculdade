@extends('layouts.app')
@section('title', $title)
@section('content')

<body id="devol_book" class="mb-5">
    <div class="mb-4">
        <h2 class="display-6">Devolução</h2>
        <a href='{{ route('alugados.index') }}'>
            <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
        </a>
    </div>

    <form method="post" action="{{ route('devolver.destroy', ['book' => $rentedbook]) }}">
        @csrf
        @method('DELETE')
        <div class="row">
            <div class="col-2">
                <img src='{{ asset("uploads/". $rentedbook->book->img) }}'>
            </div>
            <div class="col">
                <div class="form-group">
                    <table  class='table table-dark'>
                        @if (!empty($rentedbook))
                            <tr>
                                <td>Nome: {{$rentedbook->reader->name}}</td>
                                <td>RG: {{$rentedbook->reader->rg}}</td>
                                <td>Aniversário: {{  $rentedbook->reader->birthdate->format('d/m/Y') }}</td>
                            </tr>
                        @else
                            <tr class='text-danger'>
                                <td>Não foi possível encontrar o leitor</td>
                            </tr>
                        @endif
                    </table>
                    <p>Esse leitor está realizando a devolução do livro  <b>"{{ $rentedbook->book->title }}"</b> ?</p>

                </div>
                <div class=" mt-5">
                    <button type="submit" class="btn btn_base success">Sim</button>
                </div>
            </div>
        </div>
    </form>
</body>

@endsection