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
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            // this is to keep who created this news post
            $table->foreignId('user_id')->constrained();

            $table->string('category');
            // this can be used as
            // $table->enum('category', ['politics', 'sports', 'economic', 'health]);
            // but by using an seprate enum class we can add other in future

            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
