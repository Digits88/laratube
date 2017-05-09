<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_id')->unsigned();
            $table->string('customThumbnails',100);
            $table->string('duration',20);
            $table->string('sourceOne',100);
            $table->string('sourceTwo',100);
            $table->string('sourceThree',100);
            $table->integer('views');
            $table->timestamps();
        });

        Schema::table('video_details', function ($table){
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_details');
    }
}
