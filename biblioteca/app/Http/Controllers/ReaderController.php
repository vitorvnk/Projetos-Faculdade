<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;
use App\Models\Book;
use Alert;

class ReaderController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|min:3',
            'birthdate' => 'required|date',
            'cpf' => 'required|min:3|unique:readers',
            'rg' => 'required|min:3|unique:readers',
            'address' => 'required|min:10',
            'email' => 'required|min:3|email|unique:readers'
        ]);

        Reader::create($request->all());
        Alert::success('Tudo certo!', 'O cadastro ocorreu com sucesso.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reader  $reader
     * @return \Illuminate\Http\Response
     */
    public function show(Reader $reader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reader  $reader
     * @return \Illuminate\Http\Response
     */
    public function edit(Reader $reader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reader  $reader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reader $reader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reader  $reader
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reader $reader)
    {
        //
    }
}
