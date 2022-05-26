<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Auth::routes(['verify' => true]);


Route::prefix('/')->group(function(){
    Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
    Route::get('sobre', [App\Http\Controllers\HomeController::class, 'about'])->name('home.about');
    Route::get('contato', [App\Http\Controllers\HomeController::class, 'create'])->name('home.contact');
    Route::post('contato', [App\Http\Controllers\HomeController::class, 'store'])->name('home.contact');
});


Route::prefix('/app')->group(function(){
    Route::resource('dashboard', 'App\Http\Controllers\BookController');
        Route::post('dashboard/categorie', [App\Http\Controllers\CategorieController::class, 'store'])->name('categorie.store');
        Route::post('dashboard/author', [App\Http\Controllers\AuthorController::class, 'store'])->name('author.store');

    Route::prefix('/aluga')->group(function(){  //
        Route::get('/', [App\Http\Controllers\RentedBookController::class, 'index'])->name('alugados.index');

        Route::get('/devolvidos', [App\Http\Controllers\RentedBookController::class, 'indexReturned'])->name('devolvidos.index');

        Route::get('create/{book}', [App\Http\Controllers\RentedBookController::class, 'create'])->name('alugar.create');
        Route::post('create/{book}', [App\Http\Controllers\RentedBookController::class, 'store'])->name('alugar.store');

        Route::get('devolver/{book}', [App\Http\Controllers\RentedBookController::class, 'show'])->name('devolver.show');
        Route::delete('devolver/{book}', [App\Http\Controllers\RentedBookController::class, 'destroy'])->name('devolver.destroy');
    });

    Route::prefix('/leitores')->group(function(){
        Route::post('create', [App\Http\Controllers\ReaderController::class, 'store'])->name('leitores.store');
    });

    Route::resource('funcionarios', 'App\Http\Controllers\EmployeerController');
});


/* 
Route::prefix('/mailable')->group(function(){
    Route::get('/newrented', function () {
        $rentedbook = App\Models\RentedBook::find(6);
        return new App\Mail\SendMailBookRented($rentedbook);
    });
    Route::get('/latereturn', function () {
        $rentedbook = App\Models\RentedBook::find(6);
        return new App\Mail\SendMailLateReturn($rentedbook);
    });
    Route::get('/late', [App\Http\Controllers\RentedBookController::class, 'lateReturn']);
    
}); 
*/