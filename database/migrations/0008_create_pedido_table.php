<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) { // Plural para seguir o padrão
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('tipo_entrega', ['retirada_loja', 'entrega_domicilio'])->default('entrega_domicilio');
            $table->enum('status', ['pendente', 'pago', 'enviado', 'entregue', 'cancelado'])->default('pendente')->index();
            $table->decimal('total', 10, 2);
            $table->softDeletes(); 
            $table->timestamps();
        });

        Schema::create('pedido_itens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade');
            $table->foreignId('produto_id')->constrained('produto');
            $table->foreignId('variacao_id')->constrained('produto_variacoes'); 
            $table->string('produto_nome');
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 10, 2); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedido');
        Schema::dropIfExists('item_pedido');
    }
};
