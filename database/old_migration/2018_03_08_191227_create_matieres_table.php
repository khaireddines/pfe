<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->string('idMat');
            $table->primary('idMat');
            $table->string('idUnite');
            $table->string('libMat');
            $table->integer('coef');
            $table->float('nbhTd');
            $table->float('nbhC');
            $table->float('nbhTp');
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
        Schema::dropIfExists('matieres');
    }
}
