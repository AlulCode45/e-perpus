<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Books extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //make migration for books
        Schema::create('books', function (Blueprint $table) {
            $table->id('id');
            $table->integer('id_category');
            $table->string('title');
            $table->string('author');
            $table->string('publisher')->nullable();
            $table->string('isbn')->nullable();
            $table->string('cover');
            $table->string('file_name');
            $table->text('description')->nullable();
            $table->date('published_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop migration for books
        Schema::dropIfExists('books');
    }
}
