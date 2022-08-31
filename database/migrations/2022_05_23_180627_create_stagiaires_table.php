<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('cin')->nullable();
            $table->string('gender_situation')->default('Mr');
            $table->string('institut')->nullable();
            $table->string('ville')->nullable();
            $table->foreignId('user_id')
                        ->nullable()
                        ->constrained()
                        ->onUpdate('cascade')
                        ->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stagiaires');
    }
}
