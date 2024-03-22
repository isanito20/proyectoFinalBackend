<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->text('contenido');
            $table->unsignedBigInteger('id_emisor');
            $table->unsignedBigInteger('id_receptor');
            $table->unsignedBigInteger('id_anuncio');
            $table->foreign('id_emisor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_receptor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_anuncio')->references('id')->on('anuncios')->onDelete('cascade');
            // Otros campos según tus necesidades
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
}
