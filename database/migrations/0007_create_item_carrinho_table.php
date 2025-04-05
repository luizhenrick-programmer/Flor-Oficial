<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('item_carrinho', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrinho_id');
            $table->unsignedBigInteger('produto_id'); // Adicionando relação com os produtos
            $table->foreign('carrinho_id')->references('id')->on('carrinho')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_carrinho');
    }
};
