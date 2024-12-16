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
        //creates the reviews table
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            //Cascade means if the restaurant is deleted the reviews will also be deleted
            $table->foreignId('restaurants_id')->constrained()->onDelete('cascade');
            //Cascade means if the user is deleted so are thier reviews
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('rating')->unsigned()->default('1'); //rating 1-5
            $table->text('comment')->nullable();
            $table->timestamps();
            //Extra table to fix bug
            //$table->integer('restaurants_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
