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
        Schema::create('porders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('product_id');
            $table->string('product_name');
            $table->string('product_img');
            $table->string('price');
            $table->integer('qty');
            $table->string('time');
            $table->string('user_ip');
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
        Schema::dropIfExists('porders');
    }
};
