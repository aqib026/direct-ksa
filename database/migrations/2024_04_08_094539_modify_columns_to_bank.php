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
        Schema::table('bank', function (Blueprint $table) {
            //
            $table->string('iban')->after('name_ar')->default('iban:123456');
            $table->bigInteger('account_number')->after('iban')->default(123456789);
            $table->string('banner')->nullable()->change();
            $table->dropColumn(['address', 'address_ar']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank', function (Blueprint $table) {
            //
            $table->text('address');
            $table->text('address_ar');
            $table->dropColumn(['iban', 'account_number']);
            $table->string('banner')->nullable(false)->change();
        });
    }
};
