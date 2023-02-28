<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tabla_uf', function (Blueprint $table) {
            $table->id();
            $table->string('nombreIndicador');
            $table->string('codigoIndicador');
            $table->string('unidadMedidaIndicador');
            $table->float('valorIndicador');
            $table->date('fechaIndicador');
            $table->string('tiempoIndicador');
            $table->string('origenIndicador');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tabla_uf');
    }
};
