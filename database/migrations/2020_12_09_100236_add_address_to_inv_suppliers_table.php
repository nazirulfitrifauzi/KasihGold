<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressToInvSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inv_suppliers', function (Blueprint $table) {
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('postcode',5)->nullable();
            $table->string('town')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('phone1')->nullable();
            $table->unsignedBigInteger('phone2')->nullable();
            $table->unsignedBigInteger('fax')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inv_suppliers', function (Blueprint $table) {
            $table->dropColumn('address1');
            $table->dropColumn('address2');
            $table->dropColumn('address3');
            $table->dropColumn('postcode');
            $table->dropColumn('town');
            $table->dropColumn('state_id');
            $table->dropColumn('country_id');
            $table->dropColumn('phone1');
            $table->dropColumn('phone2');
            $table->dropColumn('fax');
        });
    }
}
