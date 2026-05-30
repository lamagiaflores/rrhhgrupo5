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
    Schema::create('empleados', function (Blueprint $table) {
        $table->id();
        $table->string('dni', 8)->unique();
        $table->string('nombres', 100);
        $table->string('apellidos', 100);
        $table->string('telefono', 15)->nullable();
        $table->string('correo', 100)->unique()->nullable();
        $table->string('direccion', 255)->nullable();
        $table->foreignId('id_departamento')->nullable()->constrained('departamentos')->onDelete('cascade');
        $table->foreignId('id_cargo')->nullable()->constrained('cargos')->onDelete('cascade');
        $table->date('fecha_ingreso')->nullable();
        $table->tinyInteger('estado')->default(1);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
