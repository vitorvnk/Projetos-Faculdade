@extends('layouts.app')
@section('title', $title)
@section('content')


<body id="rented_book" class="mb-5">
    <div class="mb-4">
        <h2 class="display-6">Devolvidos</h2>
        <a href='{{ route('dashboard.index') }}'>
            <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
        </a>
    </div>
        
    <table class="table table-light table-striped text-center">
        <thead>
            <tr>
                <th></th>
                <th>Livro</th>
                <th>Nome do Leitor</th>
                <th>Data da Devolução</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($returned_books as $returned_book)
                @if (!empty($returned_book->book->img))
                    <tr>
                        <td> <img src='{{ asset("uploads/". $returned_book->book->img) }}'></td>
                        <td>{{ $returned_book->book->title }}</td>
                        <td>{{ $returned_book->reader->name }}</td> 
                        <td>{{ $returned_book->deleted_at->format('d/m/Y') }}</td>
                    </tr>
                @endif
            @empty
                <td colspan="4">
                    Oops! Ainda não há livros devolvidos.
                </td>
            @endforelse
        </tbody>
    </table>

    @include('layouts.admin.paginate', [
        'data' => $returned_books
    ])

</body>

@endsection