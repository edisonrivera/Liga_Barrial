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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('code_soccer_team');
            $table->integer('position_team')->nullable();
            $table->tinyInteger('puntos_team')->default(0)->unsigned();
            $table->tinyInteger('pjugados_team')->default(0)->unsigned();
            $table->tinyInteger('pg_team')->default(0)->unsigned();
            $table->tinyInteger('pp_team')->default(0)->unsigned();
            $table->tinyInteger('pe_team')->default(0)->unsigned();
            $table->tinyInteger('gf_team')->default(0)->unsigned();
            $table->tinyInteger('gd_team')->default(0)->unsigned();
            $table->tinyInteger('gc_team')->default(0)->unsigned();
            
            $table->timestamps();
    
            $table->foreign('code_soccer_team')
                    ->references('code_soccer_team')
                    ->on('soccer_teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
