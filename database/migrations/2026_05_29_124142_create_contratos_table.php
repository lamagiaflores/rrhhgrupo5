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
    Schema::create('contratos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_empleado')->constrained('empleados')->onDelete('cascade');
        $table->string('tipo_contrato', 50)->nullable();
        $table->date('fecha_inicio')->nullable();
        $table->date('fecha_fin')->nullable();
        $table->decimal('sueldo', 10, 2)->nullable();
        $table->tinyInteger('estado')->default(1);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
