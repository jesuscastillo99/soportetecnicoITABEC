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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('curp')->unique();
            $table->string('correo')->unique();
            $table->string('paterno');
            $table->string('materno');
            $table->string('nombre');
            $table->string('sexo');
            $table->string('fn');
            $table->timestamp('fechaRegistro')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
