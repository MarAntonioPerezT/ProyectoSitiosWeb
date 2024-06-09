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
        Schema::create('labels_models', function (Blueprint $table) {
            $table->id();
            $table->string("NombreEtiqueta");
            $table->string("Descripcion");
            $table->date("FechaCreacion");
            $table->string("UsuarioCreador");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labels_models');
    }
};
