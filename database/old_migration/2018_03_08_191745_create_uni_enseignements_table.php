<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniEnseignementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::create('uni_enseignements', function (Blueprint $table) {
            $table->string('idUnite');
            $table->primary('idUnite','idUnite');
            $table->string('idForm');
            $table->string('nomUnite');
            $table->string('natureUnite');
            $table->integer('totalVol_Horaire');
            $table->integer('creditUe');
            $table->integer('coefUe');

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
        Schema::dropIfExists('uni_enseignements');
    }
}
