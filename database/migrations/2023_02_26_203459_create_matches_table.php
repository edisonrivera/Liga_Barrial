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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tournament')->nullable()->unsigned();
            $table->tinyInteger('goals_winner')->unsigned()->default(0);
            $table->tinyInteger('goals_loser')->unsigned()->default(0);
            $table->string('office_match');
            $table->date('date_match');
            $table->string('name_team_visit');
            $table->string('name_team_local');
            $table->timestamps();

            $table->foreign('id_tournament')
                  ->references('id')
                  ->on('tournaments')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
