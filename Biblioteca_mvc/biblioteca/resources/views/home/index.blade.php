@extends('layouts.home')
@section('title', 'Home')
@section('content')


<body id="index-home">
    <div class="container mt-4">
        <form method="get">
            <div class="input-group mb-3" id="inputs">
                <input type="text" class="form-control" id="inputs" placeholder="Procurar livros" aria-describedby="search" name="search" autofocus>
                <button class="btn" type="submit" id="search"><ion-icon name="search-outline"></ion-icon></button>
            </div>
        </form>
    </div>

    @include('layouts.admin.books.cards',[
        'books' => $books
    ])

</body>

@endsection