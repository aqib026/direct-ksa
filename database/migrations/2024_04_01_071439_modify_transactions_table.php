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
        Schema::table('transactions', function (Blueprint $table) {
            //
            $table->bigInteger('order_id')->nullable()->change();
            $table->string('session_id')->nullable()->change();
            $table->char('is_mobile',1)->default("0")->after("message");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
            $table->bigInteger('order_id')->nullable(false)->change();
            $table->string('session_id')->nullable(false)->change();
            $table->dropColumn('is_mobile');
        });
    }
};
