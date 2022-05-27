<div>
    <div class="row my-2">
        <div class="col-lg-12">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="inputs" name="title" value="{{ $book->title  ?? old('title') }}" >
                <label for="floatingInput">Título do Livro</label>
                <small class="form-text text-danger">{{$errors->first('title') }}</small>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-lg-12">
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="inputs" name="date" value="{{ $book->date ?? old('date') }}" >
                <label for="floatingInput">Data de lançamento</label>
                <small class="form-text text-danger">{{$errors->first('date') }}</small>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-lg-12">
            <div class="form-floating mb-3">
                <textarea class="form-control" name="description" id="inputs" cols="30" rows="5">{{ $book->description  ?? old('description') }}</textarea>
                <label for="floatingInput">Descrição</label>
                <small class="form-text text-danger">{{$errors->first('description') }}</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6"> 
            <div class="form-group mb-3">
                <label for="author_id">Autor</label><br>
                    <select name="author_id" id="inputs" class="col-lg-12">
                        <option value="" selected disabled>Selecione</option>
                        @foreach ($authors as $author)
                            @if ( (!is_null($book)) && $author->id == $book->author_id)
                                <option value='{{ $author->id }}' selected>{{ $author->name }}</option>
                            @else
                                <option value='{{ $author->id }}'>{{ $author->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <a href='#' data-bs-toggle="modal" data-bs-target="#authors">{{ $auth ?? '' }}</a> 
                </label>
                <small class="form-text text-danger">{{$errors->first('author_id') }}</small>
            </div>
        </div>
        <div class="col-lg-6"> 
            <div class="form-group mb-3">
                <label for="category_id">Categorias</label><br>
                    <select name="category_id" id="inputs" class="col-lg-12">
                        <option value="" selected disabled>Selecione</option>
                        @foreach ($categories as $categorie)
                            @if ( (!is_null($book)) && $categorie->id == $book->categorie_id)
                                <option value='{{ $categorie->id }}' selected>{{ $categorie->name }}</option>
                            @else
                                <option value='{{ $categorie->id }}'>{{ $categorie->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <a href='#' data-bs-toggle="modal" data-bs-target="#categories">{{ $categ ?? '' }}</a> 
                </label>
                <small class="form-text text-danger">{{$errors->first('category_id') }}</small>
            </div>
        </div>

    <div class="row my-2">
        <div class="col-lg-12">
            <div class="mb-3" id="file">
                <label for="image">Adicione uma Imagem</label><br>
                <input name="image" id="arquivo" type="file">
            </div>
            <small class="form-text text-danger">{{$errors->first('image') }}</small>
        </div>
    </div>
</div>     