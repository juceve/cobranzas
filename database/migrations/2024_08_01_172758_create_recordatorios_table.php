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
        Schema::create('recordatorios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('cuerpo');
            $table->date('fecha');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('model')->nullable();
            $table->integer('modelid')->nullable();
            $table->boolean('atendido')->default(false);
            $table->dateTime('fechahoraatencion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recordatorios');
    }
};
