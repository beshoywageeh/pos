<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesinvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesinvs', function (Blueprint $table) {
            $table->id();
            $table->string('inv_num', '20');
            $table->date('inv_date');
            $table->foreignId('client_id')->references('id')->on('clients');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->decimal('discount', '8', '2')->nullable();
            $table->string('tax_rate')->nullable();
            $table->decimal('tax_value', '8', '2')->nullable();
            $table->decimal('total','50','2')->nullable();
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
        Schema::dropIfExists('salesinvs');
    }
}
