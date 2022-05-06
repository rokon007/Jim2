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
            $table->string('total_amount');
            $table->string('total_paid');
            $table->string('total_deu');
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
