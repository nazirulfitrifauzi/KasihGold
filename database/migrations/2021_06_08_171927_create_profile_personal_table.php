<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_personal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('code');
            $table->string('membership_id')->nullable();
            $table->string('introducer_code')->nullable();
            $table->string('introducer_name')->nullable();
            $table->string('ic');
            $table->unsignedBigInteger('gender_id');
            $table->string('address1');
            $table->string('address2');
            $table->string('address3')->nullable();
            $table->string('postcode');
            $table->string('town');
            $table->bigInteger('state_id');
            $table->bigInteger('country_id')->nullable();
            $table->string('phone1');
            $table->integer('completed')->default(0);
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
        Schema::dropIfExists('profile_personal');
    }
}
