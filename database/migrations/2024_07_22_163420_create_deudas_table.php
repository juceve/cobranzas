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
        Schema::create('deudas', function (Blueprint $table) {
            $table->id();
            $table->date("fecha")->nullable();
            $table->integer("numdoc")->id();
            $table->float("importe", 10, 2)->nullable();
            $table->float("saldo", 10, 2)->nullable();
            $table->float("saldointerno", 10, 2)->nullable();
            $table->date("vence")->nullable();
            $table->string("antiguedad", 100)->nullable();
            $table->string("anticuacion", 100)->nullable();
            $table->string("rango", 100)->nullable();
            $table->string("cliente", 100)->nullable();
            $table->string("clilugar", 100)->nullable();
            $table->string("entnombrejefevendedor", 100)->nullable();
            $table->string("entnombresupervisor", 100)->nullable();
            $table->string("entnombrevendedor", 100)->nullable();
            $table->string("plazo", 100)->nullable();
            $table->date("fechaultimopago")->nullable();
            $table->string("ciunombre", 100)->nullable();
            $table->foreignId("deudore_id")->nullable()->constrained()->nullOnDelete();
            $table->string("limitecredito", 100)->nullable();
            $table->string("rutid", 100)->nullable();
            $table->foreignId('zona_id')->nullable()->constrained()->nullOnDelete();
            $table->string("coordenadax", 100)->nullable();
            $table->string("coordenaday", 100)->nullable();
            $table->string("telefono", 100)->nullable();
            $table->string("estado", 100)->nullable();
            $table->string("direccion")->nullable();
            $table->string("direccioninterna")->nullable();
            $table->boolean("ctrlupdate")->default(true);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deudas');
    }
};
