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
        Schema::create('penalties', function (Blueprint $table) {
            $table->smallInteger('id')->increments()->primary();
            $table->string('ci_player',10);
            $table->unsignedBigInteger('id_matches');
            $table->binary('type_penalty');
            $table->decimal('price_penalty', $precision = 4, $scale = 2);
            $table->timestamps();

            $table->foreign('ci_player')
                  ->references('ci_player')
                  ->on('players')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            
            $table->foreign('id_matches')
                  ->references('id')
                  ->on('matches')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penalties');
    }
};
