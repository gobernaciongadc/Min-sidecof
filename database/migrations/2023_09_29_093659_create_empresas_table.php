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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_metalico')->nullable();
            $table->string('tipo_no_metalico')->nullable();
            $table->string('nombres');
            $table->string('ruim')->unique();
            $table->string('mineral');

            $table->string('nro_nit');
            $table->string('nro_nim');
            $table->dateTime('fecha_caducidad');

            $table->string('longitud');
            $table->string('latitud');
            $table->string('img_mapa')->nullable();
            $table->string('archivo_pdf')->nullable();

            $table->string('representante_legal');
            $table->string('carnet');
            $table->string('celular');
            $table->string('patente');

            $table->dateTime('fecha_inscripcion');
            // Modificado para aceptar N municipios
            // $table->foreignId('municipios_id')->constrained('municipios')->onUpdate('cascade')->onDelete('restrict');
            $table->string('n_municipios', 800);

            $table->string('estado')->default('Habilitado');
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
        Schema::dropIfExists('empresas');
    }
};
