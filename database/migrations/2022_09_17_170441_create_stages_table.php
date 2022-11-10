<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->date('dateDebut')->nullable();
            $table->date('dateFin')->nullable();
            $table->text('subject');
            $table->string('attestationStatut')->nullable();
            $table->string('attestationReferences')->nullable();
            $table->string('affectation')->nullable();
            $table->foreignId('stagiaire_id')
                        ->constrained()
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
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
        Schema::dropIfExists('stages');
    }
}
