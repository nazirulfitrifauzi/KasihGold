<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomineeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominee', function (Blueprint $table) {
            $table->id();
            $table->string('beneficiary_name');
            $table->string('NRIC')->unique();
            $table->date('dob');
            $table->string('relationship');
            $table->float('percentage', 3, 2);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('avatar')->default('avatar.png');
            $table->integer('role')->default(2);
            $table->integer('active')->default(0);
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
        Schema::dropIfExists('nominee');
    }
}
