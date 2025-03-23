<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabela principal de produtos
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->decimal('preco', 10, 2);
            $table->decimal('desconto', 10, 2)->default(0.00);
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->unsignedBigInteger('marca_id')->nullable();
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('set null');
            $table->enum('status', ['publicado', 'inativo']);
            $table->unsignedBigInteger('criado_por')->nullable();
            $table->foreign('criado_por')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('produto_variacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->string('tamanho');
            $table->json('cores')->nullable();
            $table->integer('estoque')->default(0);
            $table->timestamps();
        });

        Schema::create('produto_imagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->string('url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produto_imagens');
        Schema::dropIfExists('produto_variacoes');
        Schema::dropIfExists('produtos');
    }
};
