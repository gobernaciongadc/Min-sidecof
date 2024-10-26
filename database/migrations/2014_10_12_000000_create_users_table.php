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
            $table->string('name');
            $table->string('name_bd');
            $table->integer('id_login');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('roles_id')->constrained('roles')->onUpdate('cascade')->onDelete('restrict');
            // $table->string('rol');
            $table->string('estado')->default('Habilitado');
            $table->rememberToken();
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
