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
        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::table('salesinvs', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropforeign('country_id');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropforeign('category_id');
        });
        Schema::table('salesinvs', function (Blueprint $table) {
            $table->dropforeign('client_id');
            $table->dropforeign('user_id');
        });
    }
};
