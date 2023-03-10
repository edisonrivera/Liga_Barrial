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
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger("president_team");

            $table->foreign('president_team')
                  ->references('id')
                  ->on('president_teams')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }
};