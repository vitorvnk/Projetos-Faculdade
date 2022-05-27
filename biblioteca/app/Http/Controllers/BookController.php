<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Categorie;
use Alert;
use DB;


class BookController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('verified');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $books = Book::where('title', 'LIKE', '%'.$request->get('search').'%')->paginate(6);
        return view('admin.dashboard.index', [
            'title' => 'Dashboard',
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Categorie::all();

        return view('admin.dashboard.books.form', [
            'title' => 'Adicionar',
            'authors' => $authors,
            'categories' => $categories,
            'date' => date('Y-m-d'),
            'book' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'title' =>  'required|min:3',
            'description' => 'required|min:10',
            'date' =>   'required|date',
            
        ]);

        $imageName = time().'.'.$request->image->extension();  

        $request->image->move(public_path('uploads'), $imageName);

        Book::create([
            'title'=> $request->get('title') , 
            'img'=> $imageName, 
            'description' => $request->get('description') ,
            'date'=> $request->get('date') , 
            'author_id'=> $request->get('author_id') , 
            'categorie_id' => $request->get('category_id')
        ]);

        Alert::success('Tudo certo!', 'O livro foi adicionado com sucesso.');
        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $dashboard)
    {
        $authors = Author::all();
        $categories = Categorie::all();

        return view('admin.dashboard.books.view', [
            'title' => 'Detalhes',
            'book' => $dashboard,
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $dashboard)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'title' =>  'required|min:3',
            'description' => 'required|min:10',
            'date' =>   'required|date',
            
        ]);

        if(!is_null($request->image)){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $imageName);
            unlink(public_path("uploads/$dashboard->img"));
        } else {
            $imageName = $dashboard->img;
        }

        $dashboard->update([
            'title'=> $request->get('title') , 
            'img'=> $imageName, 
            'description' => $request->get('description') ,
            'date'=> $request->get('date') , 
            'author_id'=> $request->get('author_id') , 
            'categorie_id' => $request->get('category_id')
        ]);

        Alert::success('Tudo certo!', 'O livro foi adicionado com sucesso.');
        return redirect()->route('dashboard.show', [
            'dashboard' => $dashboard->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $dashboard)
    {
        $dashboard->delete();
        Alert::success('Tudo certo!', 'O livro deletado com sucesso.');
        return redirect()->route('dashboard.index');
    }
}
