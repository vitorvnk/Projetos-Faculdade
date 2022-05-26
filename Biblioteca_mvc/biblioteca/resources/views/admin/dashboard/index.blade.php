@extends('layouts.app')
@section('title', $title)
@section('content')

<body>
    <div class="mb-4" id="dashboard">
        <h2 class="display-5">Dashboard</h2>
        <a href="{{ route('dashboard.create') }}">
            <button type="submit" class="btn btn_base primary">Cadastrar</button>    
        </a>
        <a href="{{ route('alugados.index') }}">
            <button type="submit" class="btn btn_base second">Alugados</button>    
        </a>
        <a href="{{ route('devolvidos.index') }}">
            <button type="submit" class="btn btn_base third">Devolvidos</button>    
        </a>
    </div>

    <div>
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

    @include('layouts.admin.paginate', [
        'data' => $books
    ])


</body>
@endsection