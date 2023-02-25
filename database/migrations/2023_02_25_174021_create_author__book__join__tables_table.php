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
        Schema::create('author__book__join__tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')
                ->references('id')
                ->on('books');
            $table->foreignId('author_id')
                ->references('id')
                ->on('authors');
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
        Schema::dropIfExists('author__book__join__tables');
    }
};
