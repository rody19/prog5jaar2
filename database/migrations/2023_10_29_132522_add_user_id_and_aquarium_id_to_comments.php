<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdAndAquariumIdToComments extends Migration
{
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            if (!Schema::hasColumn('comments', 'user_id')) {
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
            }

            if (!Schema::hasColumn('comments', 'aquarium_id')) {
                $table->unsignedBigInteger('aquarium_id');
                $table->foreign('aquarium_id')->references('id')->on('aquarium');
            }
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['aquarium_id']);
            $table->dropColumn(['user_id', 'aquarium_id']);
        });
    }
}