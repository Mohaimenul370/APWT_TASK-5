<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();        
            $table->tinyInteger('isActive')->default(0);
            $table->tinyInteger('userType')->default(0);
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->double('balance', 8, 2)->default(0);
            $table->double('commission', 8, 2)->default(100);
            $table->string('address')->nullable();
            $table->string('phoneNo',20)->nullable();
            $table->string('photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
