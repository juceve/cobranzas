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
        Schema::create('compromisopagos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fechahoracompromiso');
            $table->float('montocomprometido', 10, 2)->nullable();
            $table->longText('anotaciones')->nullable();
            $table->dateTime('fechahoracontacto')->nullable();
            $table->foreignId('contacto_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('contactado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compromisopagos');
    }
};
