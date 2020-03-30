<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Field extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function(Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('users', function(Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('pages', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('officials', function(Blueprint $table){
            $table->foreign('position_id')->references('id')->on('position')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Revere the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign(['role_id']);
        });

        Schema::table('pages', function(Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
}
