<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contrato
 *
 * @property $id
 * @property $id_empleado
 * @property $tipo_contrato
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $sueldo
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contrato extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_empleado', 'tipo_contrato', 'fecha_inicio', 'fecha_fin', 'sueldo', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleado()
{
    return $this->belongsTo(\App\Models\Empleado::class, 'id_empleado', 'id');
}
    
}
