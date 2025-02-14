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
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->string('nro_formulario')->nullable()->unique(); // 1
            $table->string('razon_social');  // 1 
            $table->string('nro_nim'); // 2
            $table->string('nro_nit'); // 3
            $table->string('ruim'); // 4
            $table->string('reg_partida')->nullable(); // 5

            $table->string('tipo_min_metalico')->nullable(); // 6
            $table->string('presentacion')->nullable(); // 6
            $table->string('nro_lote')->nullable(); // 7
            $table->string('tipo_min_nometalico')->nullable(); // 8
            $table->string('cert_analisis_quimico')->nullable(); // 9

            $table->string('unidad')->nullable(); // 10
            $table->string('peso_bruto_kg')->nullable(); // 10
            $table->string('peso_neto_kg')->nullable(); // 11
            $table->string('tara_kg')->nullable(); // 12
            $table->string('hum_merma')->nullable(); // 13
            $table->string('merma')->nullable(); // 12
            $table->string('ley')->nullable(); // 12

            $table->string('codigo');

            $table->string('municipio'); // 14

            $table->string('origen');
            $table->string('destino');
            $table->string('comprador')->nullable();
            $table->string('comercializadora');
            $table->string('aduana')->nullable();
            $table->string('senarecom')->nullable();

            $table->string('alicuota'); // 16
            $table->string('transporte'); // 17

            $table->string('chofer'); // 17
            $table->string('placa'); // 17

            $table->string('declarcion_jurada')->nullable(); // 18
            $table->dateTime('fecha_emision'); // 19
            $table->dateTime('fecha_valides')->nullable(); // 19
            $table->string('observaciones')->nullable(); // 20
            $table->string('comercio');
            $table->string('estado')->default('Habilitado');
            $table->integer('staging')->default(0);

            $table->integer('estado_observacion')->default(0);
            $table->integer('estado_entrega')->default(0);

            $table->foreignId('users_id')->constrained('users')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios');
    }
};
