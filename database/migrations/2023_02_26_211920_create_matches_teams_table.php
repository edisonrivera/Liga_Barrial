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
        Schema::create('matches_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matches_id');
            $table->string('code_team_visit',10);
            $table->string('code_team_local',10);
            $table->tinyInteger('goals_local')->unsigned()->default(0);
            $table->tinyInteger('goals_visit')->unsigned()->default(0);
            $table->date('date_match');
            $table->time('time_match');

            $table->foreign('matches_id')
                  ->references('id')
                  ->on('matches')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            /*
            $table->foreign('goals_local')
                  ->references('goals_local')
                  ->on('matches')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('goals_visit')
                  ->references('goals_visit')
                  ->on('matches')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            */
            $table->foreign('code_team_visit')
                  ->references('code_soccer_team')
                  ->on('soccer_teams')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('code_team_local')
                  ->references('code_soccer_team')
                  ->on('soccer_teams')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            /*
            $table->foreign('date_match')
                  ->references('date_match')
                  ->on('matches')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('time_match')
                  ->references('time_match')
                  ->on('matches')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            */
            $table->timestamps();
        });

    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches_teams');
    }
};
