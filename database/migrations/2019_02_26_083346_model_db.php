<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModelDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campagnes', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nomCampagne');
            $table->string('dateDebut');
            $table->string('dateFin');
        });
            
            Schema::create('produits', function(Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('nomProduits');
                $table->string('campagne');
                $table->unsignedInteger('campagne_id');
                
                $table->foreign('campagne_id')->references('id')->on('campagnes');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campagnes');
        Schema::drop('produits');
    }
}
