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
        Schema::create('home_page', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->string('subtitulo')->nullable();
            $table->text('descricao')->nullable();
            $table->string('imagem')->nullable();
            $table->unsignedBigInteger('desconto1')->nullable();
            $table->unsignedBigInteger('desconto2')->nullable();
            $table->unsignedBigInteger('desconto3')->nullable();
            $table->unsignedBigInteger('desconto4')->nullable();
            $table->foreign('desconto1')->references('id')->on('produtos')->onDelete('set null');
            $table->foreign('desconto2')->references('id')->on('produtos')->onDelete('set null');
            $table->foreign('desconto3')->references('id')->on('produtos')->onDelete('set null');
            $table->foreign('desconto4')->references('id')->on('produtos')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_contents');
    }
};
