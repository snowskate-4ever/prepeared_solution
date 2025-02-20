<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('publishers_to_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->nullable()->references('id')->on('books');
            $table->foreignId('publisher_id')->nullable()->references('id')->on('publishers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publishers_to_books');
    }
};
