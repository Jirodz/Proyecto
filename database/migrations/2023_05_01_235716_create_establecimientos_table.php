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
        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            $table->string('estado', 50);
            $table->string('nombre_establecimiento', 100);
            $table->integer('numero_telefono');
            $table->string('encargado', 100);
            $table->text('direccion');
            $table->unsignedBigInteger('desarrolladora_id');
            $table->foreign('desarrolladora_id')->references('id')->on('desarrolladoras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('establecimientos');
    }
};
