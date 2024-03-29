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
            $table->integer('serial');
            $table->string('inv_num', '20');
            $table->string('inv_manual', '20')->nullable();
            $table->date('inv_date');
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('discount', '8', '2')->nullable();
            $table->string('tax_rate')->nullable();
            $table->decimal('tax_value', '8', '2')->nullable();
            $table->decimal('total', '50', '2')->nullable();
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
