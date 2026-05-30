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
    Schema::create('planillas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_empleado')->constrained('empleados')->onDelete('cascade');
        $table->string('mes', 20)->nullable();
        $table->year('anio')->nullable();
        $table->decimal('sueldo_base', 10, 2)->nullable();
        $table->decimal('descuentos', 10, 2)->nullable();
        $table->decimal('bonificaciones', 10, 2)->nullable();
        $table->decimal('total_pagar', 10, 2)->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planillas');
    }
};
