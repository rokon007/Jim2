<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
			$table->string('roll')->nullable();
			$table->string('mobile')->nullable();
			$table->decimal('total_amount', 10, 2)->default(0);
			$table->decimal('total_paid', 10, 2)->default(0);
			$table->decimal('total_deu', 10, 2)->default(0);
			$table->decimal('total_personalcollection', 10, 2)->default(0);
			$table->string('replaced_by')->nullable();
			$table->string('image')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
