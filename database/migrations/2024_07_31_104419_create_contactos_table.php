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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lotedeuda_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('estadocontacto_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('gestiontipo_id')->nullable()->constrained()->nullOnDelete();
            $table->date('fechacontacto')->nullable();
            $table->string('horacontacto', 10)->nullable();
            $table->string('nombrecontacto')->nullable();
            $table->date('proxcontacto')->nullable();
            $table->longText('detalles')->nullable();
            // $table->longText('resultado')->nullable();
            $table->string('solicitudempresa')->nullable();
            $table->string('accionpropia')->nullable();
            $table->string('urlfoto')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
