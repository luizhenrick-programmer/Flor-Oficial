<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('url');
            $table->text('descricao');
            $table->decimal('preco', 10, 2);
            $table->integer('quantidade');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->json('cor');
            $table->text('tamanho');
            $table->unsignedBigInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
            $table->enum('status', ['publicado', 'inativo']);
            $table->unsignedBigInteger('criado_por')->nullable();
            $table->foreign('criado_por')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produto');
    }
};
