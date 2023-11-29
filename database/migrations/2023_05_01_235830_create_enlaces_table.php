<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enlaces', function (Blueprint $table) {
            $table->id();
            $table->string('actividad', 100);
            $table->string('negocio', 100);
            $table->string('nombre_contacto', 100);
            $table->integer('telefono');
            $table->string('nivel', 25);
            $table->unsignedBigInteger('tipolocal_id');
            $table->foreign('tipolocal_id')->references('id')->on('tipolocales');
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->unsignedBigInteger('establecimiento_id');
            $table->foreign('establecimiento_id')->references('id')->on('establecimientos');
            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')->references('id')->on('locales');
            $table->unsignedBigInteger('odf_id');
            $table->foreign('odf_id')->references('id')->on('odfs');
            $table->unsignedBigInteger('port_id');
            $table->foreign('port_id')->references('id')->on('ports');
            $table->string('responsable_operador', 100);
            $table->string('dpi_responsable', 100);
            $table->string('telefono_responsable', 100);
            $table->date('fecha')->default(now());
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enlaces');
    }
};
