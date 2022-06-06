<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_infos', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('shop_name');
            $table->string('customer_name');
            $table->string('customer_adderss');
            $table->string('customer_phone');
            $table->string('image');
			$table->decimal('total_amount', 10, 2);
			$table->decimal('total_paid', 10, 2);
			$table->decimal('total_deu', 10, 2);
			$table->string('sr')->nullable();
            $table->string('created_by');
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
        Schema::dropIfExists('customer_infos');
    }
}
