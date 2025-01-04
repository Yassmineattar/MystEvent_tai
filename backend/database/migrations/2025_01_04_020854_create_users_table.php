<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key (bigint, auto-increment)
            $table->string('name'); // User's name
            $table->string('email', 191)->unique();
            $table->string('password'); // Hashed password
            $table->enum('user_type', ['organizer', 'participator']); // User type
            $table->rememberToken(); // For "remember me" functionality
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
