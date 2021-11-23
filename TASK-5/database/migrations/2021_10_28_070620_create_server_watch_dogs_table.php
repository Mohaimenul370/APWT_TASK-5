<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerWatchDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_watch_dogs', function (Blueprint $table) {
            $table->increments('id');       
            $table->integer('companyId');
            $table->string('name',200);
            $table->string('ip',100);
            $table->integer('port');
            $table->tinyInteger('status');
            $table->timestamp('lastCheak');
            $table->string('macAddress',20)->nullable();
            $table->string('type',20)->nullable();
            $table->integer('isActive');
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
        Schema::dropIfExists('server_watch_dogs');
    }
}
