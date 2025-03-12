<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('cep', 10);
            $table->string('rua', 255);
            $table->string('numero', 10);
            $table->string('bairro', 255);
            $table->string('cidade', 255);
            $table->string('estado', 255);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('enderecos');
    }
};
