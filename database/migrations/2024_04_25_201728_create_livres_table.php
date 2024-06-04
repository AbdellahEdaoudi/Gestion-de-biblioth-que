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
        // Check if the 'livres' table exists before creating it
        if (!Schema::hasTable('livres')) {
            Schema::create('livres', function (Blueprint $table) {
                $table->id();
                $table->string('titre');
                $table->date('annee_de_pub');
                $table->integer('nombre_de_page');
                $table->unsignedBigInteger('auteur_id');
                $table->timestamps();
                $table->foreign("auteur_id")
                    ->references("id")
                    ->on("auteurs")
                    ->onDelete("cascade");
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
