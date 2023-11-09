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
        Schema::create('desarrolladoras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_desarrolladora',100);
            $table->integer('numero_telefono');
            $table->string('encargado',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desarrolladoras');
    }
};
