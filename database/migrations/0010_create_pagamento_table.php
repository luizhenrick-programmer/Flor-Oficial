<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pagamentos', function (Blueprint $table) { // Plural
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade');
            $table->decimal('valor', 10, 2);
            $table->string('metodo_pagamento')->nullable();
            $table->enum('status', ['pendente', 'aprovado', 'recusado', 'estornado'])->default('pendente')->index();
            $table->string('transacao_id')->nullable()->unique()->index(); 
            $table->dateTime('data_pagamento')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagamento');
    }
};
