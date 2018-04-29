<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
          $table->string('matProf');
          $table->primary('matProf');
          $table->string('nom');
          $table->string('prenom');
          $table->string('cin');
          $table->string('cnrps');
          $table->date('date_nai');
          $table->string('nationalite');
          $table->string('sexe');
          $table->date('date_adm');
          $table->date('date_etbs');
          $table->string('diplome');
          $table->string('adresse');
          $table->string('ville');
          $table->integer('code_postal');
          $table->integer('n_tele');
          $table->string('grade');
          $table->date('date_nomi');
          $table->date('date_titulir');
          $table->integer('n_post');
          $table->integer('n_bureau');
          $table->string('departement');
          $table->string('situation');
          $table->integer('n_compte_banque');
          $table->string('agence');
          $table->string('lieu_nai');
          $table->date('debut_con');
          $table->date('fin_con');
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
        Schema::dropIfExists('enseignants');
    }
}
