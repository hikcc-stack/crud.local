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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('surname', 128);
            $table->string('patronymic', 128)->nullable();
            $table->string('email', 128)->unique();
            // Связь с таблицей roles, значение 1 по умолчанию (подразумевается для содания пользователя с ролью "user")
            $table->foreignId('role_id')->default(1)->constrained('roles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
