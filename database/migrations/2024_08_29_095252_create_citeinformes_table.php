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
        Schema::create('citeinformes', function (Blueprint $table) {
            $table->id();
            $table->integer('correlativo')->nullable();
            $table->string('cite')->nullable();
            $table->date('fecha');
            $table->string('receptor');
            $table->string('cargoreceptor');
            $table->string('referencia');
            $table->string('fechainicial');
            $table->string('fechafinal');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('empresa_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citeinformes');
    }
};
