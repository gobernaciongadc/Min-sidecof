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
        Schema::create('mineros', function (Blueprint $table) {
            $table->id();
            $table->string('rocmin');
            $table->string('nombres');
            $table->dateTime('fecha_inscripcion');

            $table->string('nro_nit');
            $table->string('nro_nim');
            $table->dateTime('fecha_caducidad');

            $table->string('procedencia');
            $table->string('telefono');
            $table->string('estado')->default('Habilitado');

            $table->string('representante_legal');
            $table->string('carnet');
            $table->string('celular');

            $table->string('longitud');
            $table->string('latitud');
            $table->string('archivo_pdf')->nullable();

            $table->integer('user_active')->default(0);
            $table->foreignId('users_id')->constrained('users')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mineros');
    }
};
