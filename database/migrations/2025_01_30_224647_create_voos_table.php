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
        Schema::create('voos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_voo', 10);
            $table->string('origem', 100);
            $table->string('destino', 100);
            $table->date('data_voo');
            $table->time('horario');
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('voos');
    }
};