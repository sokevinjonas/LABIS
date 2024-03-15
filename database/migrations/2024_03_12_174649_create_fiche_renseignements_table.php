<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fiche_renseignements', function (Blueprint $table) {
            $table->id();
            $table->string('date_naissance');
            $table->boolean('financierement');
            $table->string('lieu_naissance');
            $table->string('pays_residence');
            $table->string('ville_residence');
            $table->string('adresse_residence');
            $table->string('residence_type')->nullable();;
            $table->string('autre_residence_type')->nullable();
            $table->string('niveau_etude');
            $table->text('diplome');
            $table->text('experience_professionnelle');
            $table->text('engagement_associatif');
            $table->text('connaissance_informatique');
            $table->text('connaissance_linguistique');
            $table->text('projet_personnel')->nullable();
            $table->text('connaissance_programme')->nullable();
            $table->text('attente_abis')->nullable();
            $table->text('competence_experience_abis')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiche_renseignements');
    }
};