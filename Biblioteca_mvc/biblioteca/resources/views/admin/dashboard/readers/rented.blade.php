@extends('layouts.app')
@section('title', $title)
@section('content')


<body id="rented_book">
    <div class="mb-4" >
            <h2 class="display-6">Alugados</h2>
            <a href="{{ route('dashboard.index') }}">
                <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
            </a>
    </div>
        
    <table class="table table-light table-striped text-center">
        <thead>
            <tr>
                <th></th>
                <th>Livro</th>
                <th>Nome</th>
                <th>Data do Empréstimo</th>
                <th>Data para Devolução</th>

                <th style="width:200px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rented_books as $rented_book)
                <tr>
                    <td> <img src='{{ asset("uploads/". $rented_book->book->img) }}'></td>
                    <td>{{ $rented_book->book->title }}</td>
                    <td>{{ $rented_book->reader->name }}</td> 
                    <td>{{ $rented_book->created_at->format('d/m/Y - H:i') }}</td>
                    <td class="{{ (strtotime($rented_book->return_date) < strtotime($today)) ? "text-danger" : "text-success" }}" >{{ $rented_book->return_date->format('d/m/Y') }}</td>

                    <td>
                        <a href='{{ route('devolver.show', ['book' => $rented_book]) }}'>
                            <button type='button' class='btn btn_base success'>Devolver</button>
                        </a>
                    </td>
                </tr>
            @empty
                <td colspan="6">
                    Oops! Ainda não há livros alugados.
                </td>
            @endforelse
        </tbody>
    </table>

    @include('layouts.admin.paginate', [
        'data' => $rented_books
    ])

</body>

@endsection