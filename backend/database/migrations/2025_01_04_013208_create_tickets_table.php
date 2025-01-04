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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade'); // Relation avec event
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relation avec user
            $table->string('email'); // Email du participant
            $table->string('code'); // Code du ticket
            $table->string('status'); // Statut du ticket (par exemple : 'valid', 'used', etc.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
