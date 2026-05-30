<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Planilla
 *
 * @property $id
 * @property $id_empleado
 * @property $mes
 * @property $anio
 * @property $sueldo_base
 * @property $descuentos
 * @property $bonificaciones
 * @property $total_pagar
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Planilla extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_empleado', 'mes', 'anio', 'sueldo_base', 'descuentos', 'bonificaciones', 'total_pagar'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleado()
{
    return $this->belongsTo(\App\Models\Empleado::class, 'id_empleado', 'id');
}
    
}
