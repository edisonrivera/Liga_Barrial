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

        Schema::create('soccer_teams', function (Blueprint $table){
            $table->string('code_soccer_team',20)->primary()->unique()->unique();

            $table->string('name_team');
            $table->unsignedBigInteger('president_team')->unique();
            $table->string('logo_team');
            $table->date('fundation_date_team');
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
