<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id');
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->string('video')->nullable();
            $table->integer('view')->default('0');
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
        Schema::dropIfExists('team_news');
    }
}
