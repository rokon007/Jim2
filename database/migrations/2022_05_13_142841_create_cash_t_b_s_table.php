<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashTBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_t_b_s', function (Blueprint $table) {
            $table->id();
			$table->decimal('cash_in_amount', 10, 2)->nullable();
			$table->decimal('cash_in_amount', 10, 2)->nullable();
            $table->string('type')->nullable();		
			$table->string('cash_describtion')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('cash_t_b_s');
    }
}
