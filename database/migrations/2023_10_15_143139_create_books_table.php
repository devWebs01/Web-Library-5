<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('isbn');
            $table->string('author');
            $table->year('year_published');
            $table->string('publisher');
            $table->longText('synopsis');
            $table->integer('book_count');
            $table->string('bookshelf')->nullable();
            $table->string('source')->nullable();
            $table->string('price')->nullable();
            $table->enum('type', ['Umum', 'Paket']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
