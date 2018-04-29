<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffectedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affecteds', function (Blueprint $table) {
            $table->string('InscriBac');
            $table->string('cin');
            $table->primary('InscriBac');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_nai');
            $table->string('departement');
            $table->year('anne_univ');
            $table->string('etat');
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
        Schema::dropIfExists('effecteds');
    }
}
