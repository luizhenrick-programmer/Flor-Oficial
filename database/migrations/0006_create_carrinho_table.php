<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('carrinho', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index()->constrained()->onDelete('cascade');
            $table->string('session_id')->nullable()->index(); // Index aqui é vital para quem não está logado
            $table->timestamps();
        });

        Schema::create('item_carrinho', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carrinho_id')->constrained('carrinho')->onDelete('cascade');
            $table->foreignId('produto_id')->constrained('produto')->onDelete('cascade');
            $table->foreignId('variacao_id')->constrained('produto_variacoes')->onDelete('cascade');
            $table->integer('quantidade')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carrinho');
        Schema::dropIfExists('item_carrinho');
    }
};
