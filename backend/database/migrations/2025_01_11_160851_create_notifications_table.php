<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('notifications', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // ID de l'utilisateur qui reçoit la notification
        $table->string('type'); // Type de notification (ex : "new_registration", "event_reminder")
        $table->text('message'); // Message de la notification
        $table->boolean('read')->default(false); // Statut de lecture
        $table->timestamps(); // Dates de création et de mise à jour
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
