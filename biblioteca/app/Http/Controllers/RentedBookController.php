<?php

namespace App\Http\Controllers;

use App\Models\RentedBook;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Reader;
use Auth;
use Alert;
use Mail;
use App\Mail\SendMailBookRented;
use App\Mail\SendMailReturnedBook;
use App\Jobs\SendEmailJob;


class RentedBookController extends Controller
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
    public function index()
    {
        return view('admin.dashboard.readers.rented', [
            'title' => 'Alugados',
            'today' => date('Y-m-d'),
            'rented_books' => RentedBook::orderBy('return_date')->paginate(6),
        ]);
    }

    public function indexReturned()
    {
        return view('admin.dashboard.readers.returned', [
            'title' => 'Devolvidos',
            'returned_books' => RentedBook::onlyTrashed()->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book, Request $request)
    {
        $reader_data = Reader::where('cpf', $request->get('reader'))->first();

        return view('admin.dashboard.books.rend', [
            'title' => 'Alugar',
            'today' => date('Y-m-d'),
            'book' => $book,
            'reader_data' => $reader_data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Book $book, Request $request)
    {
        $request->validate([
            'reader_id' => 'required|exists:readers,id' ,
            'return_date' => 'required|date'
        ]);

        $rented = RentedBook::create([
            'return_date' => $request->get('return_date'),
            'reader_id' => $request->get('reader_id'),
            'book_id' => $book->id,
            'user_id' => Auth::user()->id
        ]);

        //Encaminha E-mail ao leitor
        dispatch(new SendEmailJob($rented->reader->email , new SendMailBookRented($rented)));

        Alert::success('Tudo certo!', 'O cadastro foi realizado com sucesso. ');
        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rented_book  $RentedBook
     * @return \Illuminate\Http\Response
     */
    public function show(RentedBook $book)
    {
        return view('admin.dashboard.readers.return', [
            'title' => 'Alugar',
            'rentedbook' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rented_book  $RentedBook
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $RentedBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RentedBook  $RentedBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RentedBook $RentedBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RentedBook  $RentedBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(RentedBook $book)
    {
        $rented = $book->delete();

        //Encaminha um e-mail informando o leitor que o livro foi devolvido.
        dispatch(new SendEmailJob($book->reader->email , new SendMailReturnedBook($book)));

        Alert::success('Tudo certo!', 'A devolução foi registrada com sucesso.');
        return redirect()->route('dashboard.index');
    }
}
