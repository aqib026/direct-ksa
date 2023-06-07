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
        Schema::create('featured_sales', function (Blueprint $table) {
            $table->id();
            $table->string('required_service');
            $table->integer('paper_quantity')->nullable();
            $table->string('documents')->nullable();
            $table->string('translation_content')->nullable();
            $table->integer('idl_card_qty')->nullable();
            $table->string('lic_col_choice')->nullable();
            $table->integer('idl_qty')->nullable();
            $table->string('univ_adm_country')->nullable();
            $table->string('nationality')->nullable();
            $table->string('mode_of_finance')->nullable();
            $table->string('major_of_study')->nullable();
            $table->string('current_qualification')->nullable();
            $table->string('last_qualification_grade')->nullable();
            $table->string('certification')->nullable();
            $table->string('call_time')->nullable();
            $table->string('form_type')->nullable();
            $table->integer('passport_quantity')->nullable();
            $table->string('country')->nullable();
            $table->string('applicant_name');
            $table->string('mobile_number');
            $table->string('email');
            $table->string('service_cost')->nullable();
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
        Schema::dropIfExists('featured_sales');
    }
};
