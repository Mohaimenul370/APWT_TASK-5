<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerMikrotiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_mikrotiks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('companyId');
            $table->tinyInteger('isActive');
            $table->string('name',100);
            $table->string('ip',100);
            $table->string('dnsName',100);
            $table->integer('port');
            $table->string('username',100);
            $table->string('password',100);
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
        Schema::dropIfExists('server_mikrotiks');
    }
}
