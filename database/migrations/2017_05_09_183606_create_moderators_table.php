<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModeratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moderators', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('email',60)->index();
            $table->string('password',100)->index();
            $table->string('hash',100);
            $table->rememberToken();
            $table->boolean('isActive');
            $table->boolean('isBlock');
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
        Schema::dropIfExists('moderators');
    }
}
