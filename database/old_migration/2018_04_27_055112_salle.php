<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Salle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_salles', function (Blueprint $table) {
            $table->string('idSalle');
            $table->integer('Lession');
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
        Schema::dropIfExists('emp_salle');
    }
}
