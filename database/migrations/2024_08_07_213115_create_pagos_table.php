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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fechahorapago');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('compromisopago_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('deuda_id')->nullable()->constrained()->nullOnDelete();
            $table->float('monto', 10, 2);
            $table->float('saldoantespago', 10, 2)->nullable();
            $table->float('saldodespuespago', 10, 2)->nullable();
            $table->foreignId('metodopago_id')->nullable()->constrained()->nullOnDelete();
            $table->string('comprobantes')->nullable();
            $table->string('ncobrador')->nullable();
            $table->string('resultado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
