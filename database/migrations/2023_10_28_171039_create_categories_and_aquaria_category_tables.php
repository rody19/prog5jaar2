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

        Schema::create('aquaria_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aquaria_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('aquaria_id')->references('id')->on('aquaria')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
};
