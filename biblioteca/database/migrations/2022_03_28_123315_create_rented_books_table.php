<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rented_books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('return_date');
            $table->unsignedBigInteger('reader_id');
            $table->foreign('reader_id')->references('id')->on('readers');
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rented_books', function (Blueprint $table) {
            $table->dropForeign('rented_books_reader_id_foreign');
            $table->dropForeign('rented_books_book_id_foreign');
            $table->dropForeign('rented_books_user_id_foreign');
        });
        
        Schema::dropIfExists('rented_books');
    }
};

