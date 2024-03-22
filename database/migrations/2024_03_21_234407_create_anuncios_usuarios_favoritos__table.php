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
        Schema::create('anuncio_usuario_favoritos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anuncio_id');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('anuncio_id')->references('id')->on('anuncios')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncio_usuario_favoritos');
    }
};
