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
        Schema::table('visa_requirement', function (Blueprint $table) {
            $table->longText('mobile_detail_ar')->after('detail_ar')->nullable();
            $table->longText('mobile_detail')->after('detail_ar')->nullable();
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visa_requirement', function (Blueprint $table) {
            //
        });
    }
};
