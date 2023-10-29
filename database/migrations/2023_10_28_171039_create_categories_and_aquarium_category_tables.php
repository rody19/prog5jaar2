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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('aquarium_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aquarium_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('aquarium_id')->references('id')->on('aquarium')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
};
