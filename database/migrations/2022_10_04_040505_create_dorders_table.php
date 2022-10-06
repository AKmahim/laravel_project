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
        Schema::create('dorders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_address');
            $table->string('customer_no');
            $table->string('email');
            $table->string('payment_mode');
            $table->string('order_status');
            $table->string('user_ip');
            $table->string('created_at');
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
        Schema::dropIfExists('dorders');
    }
};
