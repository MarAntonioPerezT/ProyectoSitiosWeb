<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts_models', function (Blueprint $table) {
            $table->id();
            $table->string('TituloEntrada');
            $table->string('PostContenido');
            $table->string('PostImagen');
            $table->date('FecPublicacion');
            $table->date('Fec_creacion');
            $table->boolean('Estatus');
            $table->unsignedBigInteger('label_id');
            $table->foreign('label_id')->references('id')->on('labels_models');
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('id')->on('categories_models');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_models');
    }
};
