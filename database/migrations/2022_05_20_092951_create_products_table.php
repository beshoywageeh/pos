<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('barcode');
            $table->string('opening_balance');
            $table->decimal('purchase_price', 8, 2);
            $table->decimal('sales_price', 8, 2);
            $table->decimal('sales_unit', 8, 2);
            $table->decimal('purchase_unit', 8, 2);
            $table->biginteger('category_id')->unsigned();
            $table->text('notes')->nullable();
            $table->text('img')->nullable();
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
        Schema::dropIfExists('products');
    }
}
