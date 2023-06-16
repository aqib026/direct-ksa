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
        Schema::table('visa_requests', function (Blueprint $table) {
            if (!Schema::hasColumns('visa_requests',['adult_price', 'child_price', 'passport_price'])) {
                Schema::table('visa_requests', function (Blueprint $table) {
                    $table->string('adult_price')->after('visa_type')->nullable(true);
                    $table->string('child_price')->after('adult_price')->nullable(true);
                    $table->string('passport_price')->after('child_price')->nullable(true);
                });
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visa_requests', function (Blueprint $table) {
            //
        });
    }
};
