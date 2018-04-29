<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichVoeux extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::enableForeignKeyConstraints();
        Schema::create('fich_voeuxs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MatProf');
            $table->unique('MatProf');
            $table->boolean('h_supp');
            $table->integer('nbhT')->nullable();;
            $table->text('con_pdea');
            $table->text('con_pers');
            $table->integer('idDay');
            $table->foreign('idDay')->references('idDay')->on('Days')->onDelete('cascade');

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
        Schema::dropIfExists('fich_voeux');
    }
}
