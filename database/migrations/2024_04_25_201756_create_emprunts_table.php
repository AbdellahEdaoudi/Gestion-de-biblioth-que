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
        Schema::create("emprunts",function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger("livre_id");
            $table->foreign("livre_id")->references("id")->on("livres")->onDelete("restrict");
            $table->date('date_de_emprunte');
            $table->date('date_de_retour');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprunts');
    }
};
