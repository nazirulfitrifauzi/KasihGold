<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpotGoldExit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spot_gold_exit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('status');
            $table->integer('grammage');

            $table->string('bill_code');
            $table->string('gold_ids');


            $table->string('name');
            $table->string('phone1');
            $table->string('address1');
            $table->string('address2');
            $table->string('address3')->nullable();

            $table->string('postcode');
            $table->string('town');
            $table->bigInteger('state_id');




            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spot_gold_exit');
    }
}
