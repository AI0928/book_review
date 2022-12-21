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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('review_title', 50);
            $table->string('review_text', 500);
            $table->string('book_title', 50);
            $table->string('book_author', 50);
            $table->string('publisher', 50);
            $table->bigInteger('book_value');
            $table->string('book_text', 500);
            $table->bigInteger('point');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};