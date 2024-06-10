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
        Schema::create('categories_models', function (Blueprint $table) {
            $table->id();
            $table->string("NombreCategoria");
            $table->text("Descripcion");
            $table->date("FechaCreacion");
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users_models');
            $table->boolean('Estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_models');
    }
};
