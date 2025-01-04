<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration //Définir la structure de la base de données.
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clues', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade'); // Relation avec event
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clues');
    }
};
