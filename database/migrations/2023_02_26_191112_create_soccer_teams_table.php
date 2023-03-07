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
        Schema::create('soccer_teams', function (Blueprint $table) {
            $table->string('code_soccer_team',10)->primary();
            $table->string('name_team');
            $table->unsignedBigInteger('president_team')->unique();
            $table->string('logo_team');
            $table->date('fundation_date_team');
            $table->string('description_team');
            $table->tinyInteger('puntaje_team')->default(0)->unsigned();
            $table->tinyInteger('puntos_team')->default(0)->unsigned();
            $table->tinyInteger('gf_team')->default(0)->unsigned();
            $table->tinyInteger('gd_team')->default(0)->unsigned();
            $table->tinyInteger('gc_team')->default(0)->unsigned();
            $table->tinyInteger('pg_team')->default(0)->unsigned();
            $table->tinyInteger('pp_team')->default(0)->unsigned();
            $table->tinyInteger('pe_team')->default(0)->unsigned();
            $table->timestamps();

            $table->foreign('president_team')
                  ->references('id')
                  ->on('president_teams')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soccer_teams');
    }
};
