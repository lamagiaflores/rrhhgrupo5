<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistencia
 *
 * @property $id
 * @property $id_empleado
 * @property $fecha
 * @property $hora_entrada
 * @property $hora_salida
 * @property $observacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asistencia extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_empleado', 'fecha', 'hora_entrada', 'hora_salida', 'observacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleado()
{
    return $this->belongsTo(\App\Models\Empleado::class, 'id_empleado', 'id');
}
    
}
