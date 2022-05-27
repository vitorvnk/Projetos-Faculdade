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
        Schema::create('employeers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cpf', 15);
            $table->string('name', 230);
            $table->string('rg', 15);
            $table->date('birthdate');
            $table->text('address');
            $table->string('salary', 12);
            $table->unsignedBigInteger('departament_id');
            $table->foreign('departament_id')->references('id')->on('departaments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table){
            $table->dropforeign('employees_departament_id_foreign');
        });

        Schema::dropIfExists('employeers');
    }
};
