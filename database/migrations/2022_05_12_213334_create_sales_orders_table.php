<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();			           
            $table->string('invoice');
			$table->integer('cid');
			$table->string('shop_name');
			$table->string('customer_name');
			$table->string('customer_phone');
            $table->string('product_code');
            $table->string('product');
			$table->decimal('price', 10, 2);
            //$table->string('price');			
			$table->bigInteger('qty');
			$table->decimal('discount', 10, 2)->nullable();
           // $table->string('discount')->nullable();
		   $table->decimal('amount', 10, 2);
           // $table->string('amount');
		  $table->decimal('profit', 10, 2)->nullable();  
		   $table->string('created_by');
		  $table->string('status')->nullable();           
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
        Schema::dropIfExists('sales_orders');
    }
}
