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
        Schema::create('lotedeudas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lote_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('deuda_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('contactado')->default(false);
            $table->foreignId('gestiontipo_id')->nullable()->constrained()->nullOnDelete();
            $table->date('fechacontacto')->nullable();
            $table->string('nombrecontacto')->nullable();
            $table->date('proxcontacto')->nullable();
            $table->string('detalles')->nullable();
            $table->boolean('finalizado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotedeudas');
    }
};
