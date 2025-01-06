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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->text('question'); // La question du quiz
            $table->string('choice_1'); // Premier choix de réponse
            $table->string('choice_2'); // Deuxième choix de réponse
            $table->string('choice_3'); // Troisième choix de réponse
            $table->string('correct_answer'); // Réponse correcte (sera un des choix)
            $table->timestamps();
        });
    }
    

public function down()
{
    Schema::dropIfExists('quizzes');
}
};
