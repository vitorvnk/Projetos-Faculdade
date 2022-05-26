<div class='row row-cols-2 row-cols-lg-3' id='card'>
    @forelse ($books as $book)
        <div class='col mb-3'>
            <div class='card shadow-sm'>
                <img class='bd-placeholder-img card-img-top' src='{{ asset("uploads/$book->img") }}' alt='{{$book->title}}' >
                <div class='card-body'>
                    <p class='card-text fw-bold'>{{$book->title}}</p>
                    <small> <ion-icon name='person-circle-outline'></ion-icon> {{$book->author->name}} </small> <br>
                    <small class='text-dark'> <ion-icon name='folder-open-outline'></ion-icon> {{$book->categorie->name}}</small>
                    
                    <div class='d-flex justify-content-between align-items-center mt-3'>
                        <div class='btn-group'>
                            <a href='{{ route('alugar.create',  ['book' => $book]) }}'><button type='button' class='btn btn-sm btn-outline-secondary'>Alugar</button></a>
                            <a href='{{ route('dashboard.show', ['dashboard' => $book]) }}'><button type='button' class='btn btn-sm btn-outline-secondary'>Editar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p></p>
    @endforelse
</div>