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
        Schema::create('personagens_itens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personagem_id')->constrained('personagens')->onDelete('cascade');;
            $table->string('index');
            $table->string('name');
            $table->integer('quantidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_personagens_itens');
    }
};
