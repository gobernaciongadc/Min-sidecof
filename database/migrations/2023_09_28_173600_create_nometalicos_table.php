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
        Schema::create('nometalicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('simbolo');
            $table->double('alicuota');
            $table->string('estado')->default('Habilitado');
            $table->foreignId('users_id')->constrained('users')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nometalicos');
    }
};