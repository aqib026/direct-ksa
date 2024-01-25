<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->integer('adult_count');
            $table->integer('child_count');
            $table->bigInteger('order_id');
            $table->string('session_id');
            $table->float('total_amount');
            $table->float('service_charges')->nullable();
            $table->float('customer_service_charges')->nullable();
            $table->float('vat_amount')->nullable();
            $table->float('invoice_value')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->dateTimeTz('transaction_date')->nullable();
            $table->char('status', 20)->default('pending');
            $table->string('message')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
