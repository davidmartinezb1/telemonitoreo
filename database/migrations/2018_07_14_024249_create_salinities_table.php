<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalinitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salinities', function (Blueprint $table) {
            $table->increments('id',true);
            $table->double('measurement');
            $table->integer('station_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('salinities', function($table) {
            $table->foreign('station_id')->references('id')->on('stations');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salinities');
    }
}
