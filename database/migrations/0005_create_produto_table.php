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
            $table->string('nome')->index();
            $table->text('descricao')->nullable();
            $table->decimal('preco', 10, 2);
            $table->decimal('desconto', 10, 2)->default(0.00);
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade')->index();
            $table->foreignId('marca_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('status', ['publicado', 'inativo'])->default('publicado')->index();
            $table->foreignId('criado_por')->nullable()->constrained('users')->onDelete('set null');
            $table->softDeletes(); 
            $table->timestamps();
        });

        Schema::create('produto_variacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')->constrained('produto')->onDelete('cascade');
            $table->string('tamanho')->nullable()->index();
            $table->string('cor')->nullable()->index();
            $table->integer('estoque')->default(0);
            $table->timestamps();
        });

        Schema::create('produto_imagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')->constrained('produto')->onDelete('cascade');
            $table->string('url');
            $table->boolean('principal')->default(false);
            $table->integer('ordem')->default(0);
            $table->timestamps();
        });
    }
};
