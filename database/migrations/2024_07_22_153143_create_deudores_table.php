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
        Schema::create('deudores', function (Blueprint $table) {
            $table->id();
            $table->integer('codigocliente');
            $table->string('cliente');
            $table->string('docid')->nullable();
            $table->foreignId('tipodoc_id')->nullable()->constrained()->nullOnDelete();
            $table->string('fechanacimiento')->nullable();
            $table->string('telffijo')->nullable();
            $table->string('telfcelular');
            $table->string('telfref1')->nullable();
            $table->string('telfref2')->nullable();
            $table->string('telfref3')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('pais')->nullable();
            $table->string('ciudad');
            $table->string('domcoorx')->nullable();
            $table->string('domcoory')->nullable();
            $table->string('domdireccion')->nullable();
            $table->string('trabcoorx')->nullable();
            $table->string('trabcoory')->nullable();
            $table->string('trabdireccion')->nullable();
            $table->foreignId('empresa_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deudores');
    }
};
