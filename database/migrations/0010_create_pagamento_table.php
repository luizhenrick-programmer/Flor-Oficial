<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pagamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_id'); // Alterado de carrinho_id para pedido_id
            $table->foreign('pedido_id')->references('id')->on('pedido')->onDelete('cascade');
            $table->enum('status', ['pendente', 'aprovado', 'recusado']);
            $table->decimal('valor', 10, 2);
            $table->dateTime('data_pagamento');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagamento');
    }
};
