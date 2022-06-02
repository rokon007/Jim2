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
			$table->string('product_code');
			$table->string('product_name');
			$table->bigInteger('product_quantity');
			$table->decimal('price', 10, 2);
			$table->integer('status')->default(1);
            $table->integer('is_cable')->default(0);
            $table->bigInteger('lowquantity_alart');
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
