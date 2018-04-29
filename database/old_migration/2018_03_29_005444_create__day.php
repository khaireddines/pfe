<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {Schema::enableForeignKeyConstraints();
        Schema::create('Days', function (Blueprint $table) {
            $table->increments('idDay');
            $table->string('MatProf');
            $table->string('Lundi');
            $table->string('Mardi');
            $table->string('Mercredi');
            $table->string('Jeudi');
            $table->string('Vendredi');
            $table->string('Samedi');
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
        Schema::dropIfExists('Day');
    }
}
